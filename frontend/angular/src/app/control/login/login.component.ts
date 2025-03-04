import { Component } from '@angular/core';
import { Autenticado } from '../Autenticado';

@Component({
  selector: 'app-login',
  imports: [],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  username: string = '';
  password: string = '';
  errorMessage: string = '';

  constructor(private autenticado: Autenticado) {}

  onLogin(): void {
    this.autenticado.login(this.username, this.password).subscribe(
      (response) => {
        // Si el login es exitoso, guardamos el token
        this.autenticado.saveToken(response.token);
        // Redirigir a la página principal o donde sea necesario
        console.log('Login exitoso');
      },
      (error) => {
        // Si las credenciales son incorrectas
        this.errorMessage = 'Credenciales incorrectas';
      }
    );
  }
}

