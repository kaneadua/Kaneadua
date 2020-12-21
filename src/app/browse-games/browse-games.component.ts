import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-browse-games',
  templateUrl: './browse-games.component.html',
  styleUrls: ['./browse-games.component.scss']
})
export class BrowseGamesComponent implements OnInit {
// dummy data for storing the games.. this will be done using a service and will be loaded from firebase
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
