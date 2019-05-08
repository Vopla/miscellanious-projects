import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-square',
  templateUrl: './square.component.html',
  styleUrls: ['./square.component.css']
})
export class SquareComponent implements OnInit {
  id: '1';
  name: 'square';
  clicked: false;
  partOfTheRoute: false;

  constructor() { }

  ngOnInit() {
  }

}
