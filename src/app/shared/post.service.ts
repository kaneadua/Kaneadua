import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  url ="http://api.kaneadua.com/";
  constructor(private http: HttpClient) { }


  getDetails(){
    return this.http.get(this.url);
  }
  postDetails(userdetails:any){
      return this.http.post(this.url,userdetails)
  }
}
