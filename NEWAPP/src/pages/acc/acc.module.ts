import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { AccPage } from './acc';

@NgModule({
  declarations: [
    AccPage,
  ],
  imports: [
    IonicPageModule.forChild(AccPage),
  ],
})
export class AccPageModule {}
