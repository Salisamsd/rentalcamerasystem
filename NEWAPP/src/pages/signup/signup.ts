import { Component, ViewChild } from "@angular/core";
import { NavController, AlertController } from "ionic-angular";
import { LoginPage } from "../login/login";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import "rxjs/add/operator/map";

/**
 * Generated class for the SignupPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-signup",
  templateUrl: "signup.html"
})
export class SignupPage {
  @ViewChild("username") username;
  @ViewChild("password") password;
  @ViewChild("password1") password1;
  @ViewChild("name") name;
  @ViewChild("lastname") lastname;
  @ViewChild("bdate") bdate;
  @ViewChild("personID") personID;
  @ViewChild("address") address;
  @ViewChild("email") email;
  @ViewChild("mobile") mobile;
  constructor(
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    private http: Http,
    public loading: LoadingController
  ) {}

  Register() {
    //// check to confirm the username, email, telephone and password fields are filled

    if (this.username.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาป้อนชื่อผู้ใช้",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.password.value != this.password1.value) {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "รหัสผ่านของท่านไม่ตรงกัน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.bdate.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุวันเกิดของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.name.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุชื่อของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.lastname.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุนามสกุลของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.personID.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุเลขบัตรประชาชนของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.address.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุที่อยู่ของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.email.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุ E-mail ของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.mobile.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "กรุณาระบุหมายเลขโทรศัพท์ของท่าน",
        buttons: ["OK"]
      });

      alert.present();
    } else if (this.password.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",
        subTitle: "โปรดระบุรหัสผ่าน",
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
        password: this.password.value,
        mobile: this.mobile.value,
        email: this.email.value,
        name: this.name.value,
        lastname: this.lastname.value,
        bdate: this.bdate.value,
        personID: this.personID.value,
        address: this.address.value
      };

      let loader = this.loading.create({
        content: "Processing please wait..."
      });

      loader.present().then(() => {
        this.http
          .post("http://manocamera.com/api/register1.php", data, options)
          .map(res => res.json())
          .subscribe(res => {
            loader.dismiss();
            if (res == "Registration successfull") {
              let alert = this.alertCtrl.create({
                title: "สมัครสมาชิกสำเร็จ",
                //subTitle: res,
                buttons: ["OK"]
              });

              alert.present();
              this.navCtrl.setRoot(LoginPage);
            } else {
              let alert = this.alertCtrl.create({
                title: "ERROR",
                subTitle: res,
                buttons: ["OK"]
              });

              alert.present();
            }
          });
      });
    }
  }
}
