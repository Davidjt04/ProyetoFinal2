import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponentComponent } from '../login-component/login-component.component';
import { DashboardComponent } from './dashboard/dashboard.component.component';

const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponentComponent },
  { path: 'dashboard', component: DashboardComponent },
  // Rutas adicionales según el rol
  { path: 'admin/dashboard', component: DashboardComponent },
  { path: 'experto/dashboard', component: DashboardComponent },
  { path: 'competidor/dashboard', component: DashboardComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
