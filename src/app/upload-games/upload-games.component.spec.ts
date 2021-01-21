import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UploadGamesComponent } from './upload-games.component';

describe('UploadGamesComponent', () => {
  let component: UploadGamesComponent;
  let fixture: ComponentFixture<UploadGamesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UploadGamesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UploadGamesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
