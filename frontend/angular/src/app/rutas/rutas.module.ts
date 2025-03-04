import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from '../control/login/login.component';
// import { RegistroComponent } from '../control/registro/registro.component';
import { AdminComponent } from '../dashboard/admin/admin.component';
import { ExpertoComponent } from '../dashboard/experto/experto.component';
import { AnonimoComponent } from '../dashboard/anonimo/anonimo.component';



const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'admin', component: AdminComponent,  data: { role: 'admin' } },
  { path: 'experto', component: ExpertoComponent, data: { role: 'experto' } },
  { path: 'anonimo', component: AnonimoComponent, data: { role: 'anonimo' } },
  // { path: 'anonimo', component: AnonimoComponent, canActivate: [AuthGuard], data: { role: 'anonimo' } },

  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: '**', redirectTo: '/login' } // Ruta por defecto
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule
  ]
})
export class RutasModule { }
