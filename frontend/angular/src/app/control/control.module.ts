import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginComponent } from './login/login.component';
import { RegistroComponent } from './registro/registro.component';
import { Autenticado } from './Autenticado';

//authservice
//authguard

import { FormsModule } from '@angular/forms';


@NgModule({
  declarations: [],
  imports: [
    CommonModule,FormsModule,LoginComponent,RegistroComponent
  ],
  // providers: [AuthService, AuthGuard],
  exports: [LoginComponent] // Para poder usarlo en otros módulos

})
export class ControlModule { }
