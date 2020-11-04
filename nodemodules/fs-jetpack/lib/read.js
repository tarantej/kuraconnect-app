/* eslint no-console:1 */

'use strict';

var fs = require('./utils/fs');
var validate = require('./utils/validate');

var supportedReturnAs = ['utf8', 'buffer', 'json', 'jsonWithDates'];

var validateInput = function (methodName, path, returnAs) {
  var methodSignature = methodName + '(path, returnAs)';
  validate.argument(methodSignature, 'path', path, ['string']);
  validate.argument(methodSignature, 'returnAs', returnAs, ['string', 'undefined']);

  if (returnAs && supportedReturnAs.indexOf(returnAs) === -1) {
    throw new Error('Argument "returnAs" passed to ' + methodSignature
      + ' must have one of values: ' + supportedReturnAs.join(', '));
  }
};

// Matches strings generated by Date.toJSON()
// which is called to serialize date to JSON.
var jsonDateParser = function (key, value) {
  var reISO = /^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*))(?:Z|(\+|-)([\d|:]*))?$/;
  if (typeof value === 'string') {
    if (reISO.exec(value)) {
      return new Date(value);
    }
  }
  return value;
};

var makeNicerJsonParsingError = function (path, err) {
  var nicerError = new Error('JSON parsing failed while reading '
  + path + ' [' + err + ']');
  nicerError.originalError = err;
  return nicerError;
};

// ---------------------------------------------------------
// SYNC
// ---------------------------------------------------------

var readSync = function (path, returnAs) {
  var retAs = returnAs || 'utf8';
  var data;

  var encoding = 'utf8';
  if (retAs === 'buffer') {
    encoding = null;
  }

  try {
    data = fs.readFileSync(path, { encoding: encoding });
  } catch (err) {
    if (err.code === 'ENOENT') {
      // If file doesn't exist return undefined instead of throwing.
      return undefined;
    }
    // Otherwise rethrow the error
    throw err;
  }

  try {
    if (retAs === 'json') {
      data = JSON.parse(data);
    } else if (retAs === 'jsonWithDates') {
      data = JSON.parse(data, jsonDateParser);
    }
  } catch (err) {
    throw makeNicerJsonParsingError(path, err);
  }

  return data;
};

// ---------------------------------------------------------
// ASYNC
// ---------------------------------------------------------

var readAsync = function (path, returnAs) {
  return new Promise(function (resolve, reject) {
    var retAs = returnAs || 'utf8';
    var encoding = 'utf8';
    if (retAs === 'buffer') {
      encoding = null;
    }

    fs.readFile(path, { encoding: encoding })
    .then(function (data) {
      // Make final parsing of the data before returning.
      try {
        if (retAs === 'json') {
          resolve(JSON.parse(data));
        } else if (retAs === 'jsonWithDates') {
          resolve(JSON.parse(data, jsonDateParser));
        } else {
          resolve(data);
        }
      } catch (err) {
        reject(makeNicerJsonParsingError(path, err));
      }
    })
    .catch(function (err) {
      if (err.code === 'ENOENT') {
        // If file doesn't exist return undefined instead of throwing.
        resolve(undefined);
      } else {
        // Otherwise throw
        reject(err);
      }
    });
  });
};

// ---------------------------------------------------------
// API
// ---------------------------------------------------------

exports.validateInput = validateInput;
exports.sync = readSync;
exports.async = readAsync;