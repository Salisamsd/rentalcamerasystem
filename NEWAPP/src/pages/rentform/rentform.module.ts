import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { RentformPage } from './rentform';

@NgModule({
  declarations: [
    RentformPage,
  ],
  imports: [
    IonicPageModule.forChild(RentformPage),
  ],
})
export class RentformPageModule {}
