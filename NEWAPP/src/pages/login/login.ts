import { Component, ViewChild } from "@angular/core";
import { NavController, AlertController } from "ionic-angular";
import { SignupPage } from "../signup/signup";
import { TabsPage } from "../tabs/tabs";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import "rxjs/add/operator/map";
import { ProfilePage } from "../profile/profile";
import { HomePage } from "../home/home";
import { ContactPage } from "../contact/contact";

@Component({
  selector: "page-login",
  templateUrl: "login.html"
})
export class LoginPage {
  @ViewChild("username") username;
  @ViewChild("password") password;
  data: string;
  items: any;

  constructor(
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    private http: Http,
    public loading: LoadingController
  ) {}

  signup() {
    this.navCtrl.push(SignupPage, {}, { animate: false });
  }

  signIn() {
    //// check to confirm the username and password fields are filled

    if (this.username.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "Username field is empty",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.password.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "Password field is empty",
        buttons: ["OK"]
      });

      alert.present();
    } else {
      var headers = new Headers();
      headers.append("Accept", "application/json");
      headers.append("Content-Type", "application/json");
      let options = new RequestOptions({ headers: headers });

      let data = {
        username: this.username.value,
        password: this.password.value
      };

      let loader = this.loading.create({
        content: "Processing please wait..."
      });

      loader.present().then(() => {
        this.http
          .post("http://manocamera.com/api/login.php", data, options)
          .map(res => res.json())
          .subscribe(res => {
            console.log(res);
            loader.dismiss();
            if (res == "Your Login success") {
              let alert = this.alertCtrl.create({
                title: "CONGRATS",
                subTitle: res,
                buttons: ["OK"]
              });

              alert.present();
              this.navCtrl.setRoot(TabsPage, data);
            } else {
              let alert = this.alertCtrl.create({
                title: "ERROR",
                subTitle: "Your Login Username or Password is invalid",
                buttons: ["OK"]
              });

              alert.present();
            }
          });
      });
    }
  }
}
