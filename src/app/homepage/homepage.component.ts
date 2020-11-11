import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-homepage',
  templateUrl: './homepage.component.html',
  styleUrls: ['./homepage.component.scss']
})
export class HomepageComponent implements OnInit {
  popularGames = [
    {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
     {image: 'https://www.kaneadua.com/wp-content/uploads/2020/06/fifa20-vault-drop-article-featured-image.jpg.adapt_.crop16x9.431p.jpg',
     title: 'FIFA 20'},
    ]
  constructor() { }

  ngOnInit(): void {
  }

}
