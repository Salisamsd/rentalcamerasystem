import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { DslrPage } from './dslr';

@NgModule({
  declarations: [
    DslrPage,
  ],
  imports: [
    IonicPageModule.forChild(DslrPage),
  ],
})
export class DslrPageModule {}
