import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';


import { WelcomePage } from '../pages/welcome/welcome';
import { LoginPage } from '../pages/login/login';
import { SignupPage } from '../pages/signup/signup';
import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { ProfilePage } from '../pages/profile/profile';
import { DslrPage } from '../pages/dslr/dslr';
import { DetailPage } from '../pages/detail/detail';
import { AddCartPage } from '../pages/add-cart/add-cart';
import { UpimagePage } from '../pages/upimage/upimage';
import { RentformPage } from '../pages/rentform/rentform';
import { RentPage } from '../pages/rent/rent';
import { HistoryPage } from '../pages/history/history';
import { MirrorlessPage } from '../pages/mirrorless/mirrorless';
import { VideoPage } from '../pages/video/video';
import { ActonPage } from '../pages/acton/acton';
import { AccPage } from '../pages/acc/acc';
import { ChangepassPage } from '../pages/changepass/changepass';
import { DetailRentPage } from '../pages/detail-rent/detail-rent';
import { DetailWcPage } from '../pages/detail-wc/detail-wc';

import { AccordionComponent } from '../components/accordion/accordion';

import { File } from '@ionic-native/file';
import { FileTransfer} from '@ionic-native/file-transfer';
import { Camera } from '@ionic-native/camera';
import { HttpModule } from '@angular/http';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { IonicStorageModule } from '@ionic/storage';


@NgModule({
  declarations: [
    MyApp,
    WelcomePage,
    LoginPage,
    SignupPage,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    ProfilePage,
    DslrPage,
    DetailPage,
    AddCartPage,
    UpimagePage,
    RentformPage,
    RentPage,
    HistoryPage,
    AccordionComponent,
    MirrorlessPage,
    VideoPage,ActonPage,
    AccPage,ChangepassPage,
    DetailRentPage,
    DetailWcPage
    
  ],
  imports: [
    BrowserModule,
    HttpModule,
    IonicModule.forRoot(MyApp),
    IonicStorageModule.forRoot()
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    WelcomePage,
    LoginPage,
    SignupPage,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    ProfilePage,
    DslrPage,
    DetailPage,
    AddCartPage,
    UpimagePage,
    RentformPage,RentPage,HistoryPage,
    MirrorlessPage,VideoPage,ActonPage,AccPage,ChangepassPage
  ,DetailRentPage,DetailWcPage
],
providers: [
  StatusBar,
  SplashScreen,Camera,FileTransfer,File,
  {provide: ErrorHandler, useClass: IonicErrorHandler}
]
})
export class AppModule {}