"use strict";

const report = require("../../utils/report");
const ruleMessages = require("../../utils/ruleMessages");
const validateOptions = require("../../utils/validateOptions");

const ruleName = "no-missing-end-of-source-newline";

const messages = ruleMessages(ruleName, {
  rejected: "Unexpected missing end-of-source newline"
});

const rule = function(primary, _, context) {
  return (root, result) => {
    const validOptions = validateOptions(result, ruleName, { primary });

    if (!validOptions) {
      return;
    }

    if (root.source.inline || root.source.lang === "object-literal") {
      return;
    }

    const rootString = context.fix ? root.toString() : root.source.input.css;

    if (!rootString.trim() || rootString.slice(-1) === "\n") {
      return;
    }

    // Fix
    if (context.fix) {
      root.raws.after = context.newline;

      return;
    }

    report({
      message: messages.rejected,
      node: root,
      index: rootString.length - 1,
      result,
      ruleName
    });
  };
};

rule.ruleName = ruleName;
rule.messages = messages;
module.exports = rule;
