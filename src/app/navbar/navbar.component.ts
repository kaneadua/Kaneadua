import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {

  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  onUploadgames(){
    //checking if user is already loggin in

    let __user = localStorage.getItem("user");
    console.log(__user);
    if(!__user){
      this.router.navigate(['upload-games']);
      console.log("no user");
    }else{
      console.log('user');
      this.router.navigate([''])
    }
  }

}
