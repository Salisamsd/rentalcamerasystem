import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { MirrorlessPage } from './mirrorless';

@NgModule({
  declarations: [
    MirrorlessPage,
  ],
  imports: [
    IonicPageModule.forChild(MirrorlessPage),
  ],
})
export class MirrorlessPageModule {}
