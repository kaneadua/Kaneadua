import { SignUpComponent } from './sign-up/sign-up.component';
import { RegisterComponent } from './register/register.component';
import { MainpageComponent } from './mainpage/mainpage.component';
import { LoginComponent } from './login/login.component';
import { HomepageComponent } from './homepage/homepage.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BrowseGamesComponent } from './browse-games/browse-games.component';
import { UploadGamesComponent } from './upload-games/upload-games.component';

const routes: Routes = [
  {path: '', component: MainpageComponent, children: [
    {path: 'home', component: HomepageComponent},
    {path: 'register', component: SignUpComponent},
    {path: 'browse-games', component: BrowseGamesComponent},
    {path: 'upload-games', component: UploadGamesComponent},
    // {path: 'signUp', component: SignUpComponent},
  ]},
  {path: 'login', component: LoginComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
