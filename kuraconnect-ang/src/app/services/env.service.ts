import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EnvService {
API_URL = 'https://kuraconnectapp.herokuapp.com/api';
  constructor() { }
}
