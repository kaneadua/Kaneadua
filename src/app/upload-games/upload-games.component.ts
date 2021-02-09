import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-upload-games',
  templateUrl: './upload-games.component.html',
  styleUrls: ['./upload-games.component.scss']
})
export class UploadGamesComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
    this.videoplayer();
  }

  videoplayer(){
    var rand = Math.floor(Math.random() * 5);

            var x = document.getElementById("src");

            switch (rand) {
                case 0:
                    x.setAttribute('src', '../../assets/vid1.webm');
                    break;
                case 1:
                    x.setAttribute('src', '../../assets/vid5.webm');
                    break;
                case 2:
                    x.setAttribute('src', '../../assets/vid4.webm');
                    break;
                case 3:
                    x.setAttribute('src', '../../assets/vid2.webm');
                    break;
                case 4:
                    x.setAttribute('src', '../../assets/vid3.webm');
            }
  }

}
