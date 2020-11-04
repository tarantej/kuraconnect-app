import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './guard/auth.guard';


const routes: Routes = [
  {
    path: '',
    redirectTo: 'landing',
    pathMatch: 'full'
  },
{ path: 'landing', loadChildren: './pages/landing/landing.module#LandingPageModule' },
  { path: 'login', loadChildren: './pages/user/login/login.module#LoginPageModule' },
  { path: 'register', loadChildren: './pages/user/register/register.module#RegisterPageModule' },
  { path: 'dashboard', loadChildren: './pages/dashboard/dashboard.module#DashboardPageModule', canActivate: [AuthGuard] },
//   { path: 'home', loadChildren: './home/home.module#HomePageModule', canActivate: [AuthGuard] },
//   { path: 'list', loadChildren: './list/list.module#ListPageModule', canActivate: [AuthGuard] }
//     path: 'folder/:id',
//     loadChildren: () => import('./folder/folder.module').then( m => m.FolderPageModule)
//   },
  {
    path: 'landing',
    loadChildren: () => import('./pages/landing/landing.module').then( m => m.LandingPageModule)
  },
//   {
//     path: 'login',
//     loadChildren: () => import('./pages/auth/login/login.module').then( m => m.LoginPageModule)
//   },
//   {
//     path: 'register',
//     loadChildren: () => import('./pages/auth/register/register.module').then( m => m.RegisterPageModule)
//   },
  {
    path: 'dashboard',
    loadChildren: () => import('./pages/dashboard/dashboard.module').then( m => m.DashboardPageModule)
  },
  {
    path: 'login',
    loadChildren: () => import('./pages/user/login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'register',
    loadChildren: () => import('./pages/user/register/register.module').then( m => m.RegisterPageModule)
  }
];

// @NgModule({
// //   imports: [
// //     RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
// //   ],
// //   exports: [RouterModule]
// })

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
