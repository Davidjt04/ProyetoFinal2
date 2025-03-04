// archivo: auth.service.ts

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class Autenticado {
  private apiUrl = 'http://localhost/login.php'; // URL del backend

  constructor(private http: HttpClient) {}

  login(username: string, password: string): Observable<any> {
    const body = { username, password };
    return this.http.post<any>(this.apiUrl, body);
  }

  saveToken(token: string): void {
    localStorage.setItem('token', token); // Guardar el token en localStorage
  }

  getToken(): string | null {
    return localStorage.getItem('token'); // Obtener el token del localStorage
  }

  logout(): void {
    localStorage.removeItem('token'); // Eliminar el token al hacer logout
  }

  isLoggedIn(): boolean {
    const token = this.getToken();
    return token !== null;
  }
}
