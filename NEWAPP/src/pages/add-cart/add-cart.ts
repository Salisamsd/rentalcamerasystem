import { Component, ViewChild } from "@angular/core";
import {
  NavController,
  ModalController,
  AlertController,
  NavParams,
  ToastController,
  ViewController
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import { Storage } from "@ionic/storage";
import { DatePipe } from "@angular/common";
import { dateValueRange } from "ionic-angular/umd/util/datetime-util";
import { RentPage } from "../rent/rent";
import { RentformPage } from "../rentform/rentform";
import { TabsPage } from "../tabs/tabs";
import { HistoryPage } from "../history/history";
/**
 * Generated class for the AddCartPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-add-cart",
  templateUrl: "add-cart.html"
})
export class AddCartPage {
  item: any;
  item_id: any;
  img1: any;
  item_priceperday: any;
  item_name: any;
  deposit_1: any;
  deposit_2: any;
  username: any;
  items: any;
  total: any;
  sdate: any;
  edate: any;
  value: any;
  optionRent: any;
  function: any;
  @ViewChild("personID") personID;
  @ViewChild("optionRent_id") optionRent_id;
  constructor(
    public alertCtrl: AlertController,
    private toastCtrl: ToastController,
    public navCtrl: NavController,
    public navParams: NavParams,
    public storage: Storage,
    public modalCtrl: ModalController,
    public viewCtrl: ViewController,
    private http: Http,
    public loading: LoadingController
  ) {
    this.item = navParams.data;
    this.username = this.navParams.get("username");
    this.username = navParams.data;
    //this.total = 0.0;
    this.total = this.navParams.get("total");
    this.item_id = this.navParams.get("item_id");
    this.item_name = this.navParams.get("item_name");
    this.img1 = this.navParams.get("img1");
    this.item_priceperday = this.navParams.get("item_priceperday");
    this.sdate = this.navParams.get("sdate");
    this.edate = this.navParams.get("edate");
    this.deposit_1 = this.navParams.get("deposit_1");
    this.deposit_2 = this.navParams.get("deposit_2");
    this.username = this.navParams.get("username");
    this.username = this.navParams.get("username");
    //this.optionRent = '1';
    //this.optionRent = this.navParams.get('value');
  }
  ionViewDidLoad() {
    console.log("ionViewDidLoad AddCartPage");
    console.log(this.navParams.data);
  }

  goback() {
    this.navCtrl.pop();
    console.log("Click on button Test Console Log");
    //}
  }

  // abbTocart(item){
  // this.navCtrl.push(RentPage,item);
  //}
  abbTocart() {
    //let dropdt = +new Date(this.item.edate);
    //let pickdt = +new Date(this.item.sdate);
    //let daysDiff = Math.round((dropdt-pickdt)/86400000);

    //this.navCtrl.setRoot(RentPage,item);
    //console.log(item);
    // this.item_id = this.navParams.get("item_id");
    // this.item_name = this.navParams.get("item_name");
    // this.img1 = this.navParams.get("img1");
    // this.item_priceperday = this.navParams.get("item_priceperday");
    // this.deposit_1 = this.navParams.get("deposit_1");
    // this.deposit_2 = this.navParams.get("deposit_2");
    // this.sdate = this.navParams.get("sdate");
    // this.edate = this.navParams.get("edate");

    //this.optionRent = this.value;
    if (this.optionRent == undefined) {
      let alert = this.alertCtrl.create({
        title: "โปรดเลือกรูปแบบการเช่า",

        //subTitle:"Country field is empty",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.function == undefined) {
      let alert = this.alertCtrl.create({
        title: "โปรดอ่านและยอมรับเงื่อนไข",

        //subTitle:"Country field is empty",

        buttons: ["OK"]
      });

      alert.present();
    } else {
      var headers = new Headers();
      headers.append("Accept", "application/json");
      headers.append("Content-Type", "application/json");
      let options = new RequestOptions({ headers: headers });
      let dropdt = +new Date(this.edate.value);
      let pickdt = +new Date(this.sdate.value);

      let data = {
        daysDiff: Math.round((dropdt - pickdt) / 86400000),
        //item_id: this.item_id,
        item_name: this.item_name,
        sdate: this.sdate,
        edate: this.edate,
        total: this.total,
        //personID: this.personID.value,
        optionRent: this.optionRent,
        username: this.username
      };

      let loader = this.loading.create({
        content: "Processing please wait..."
      });

      loader.dismiss().then(() => {
        this.http
          .post("http://manocamera.com/api/rent.php", data, options)
          .map(res => res.json())
          .subscribe(res => {
            //loader.dismiss(); ใช้ Line api
            if (res == "คิวว่าง") {
              let alert = this.alertCtrl.create({
                title: "ทำรายการเช่าสำเร็จ",
                // subTitle:(res),
                buttons: ["OK"]
              });

              // alert.present();
              // this.navCtrl.push(TabsPage, data);
              // console.log(data);
            } else {
              let alert = this.alertCtrl.create({
                title: "ทำรายการเช่าสำเร็จ",
                //subTitle:"กรุณากดโอเค",
                buttons: ["OK"]
              });

              alert.present();
              this.navCtrl.setRoot(TabsPage, data);
              console.log(data);
            }
          });
      });
    }
  }
  checkdetail() {
    this.modalCtrl.create(RentformPage).present();
  }
}
