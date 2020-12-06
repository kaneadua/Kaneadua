import { RegisterComponent } from './register/register.component';
import { MainpageComponent } from './mainpage/mainpage.component';
import { LoginComponent } from './login/login.component';
import { HomepageComponent } from './homepage/homepage.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BrowseGamesComponent } from './browse-games/browse-games.component';

const routes: Routes = [
  {path: '', component: MainpageComponent, children: [
    {path: 'home', component: HomepageComponent},
    {path: 'register', component: RegisterComponent},
    {path: 'browse-games', component: BrowseGamesComponent},
    {path: 'footer', component: BrowseGamesComponent},
  ]},
  {path: 'login', component: LoginComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
