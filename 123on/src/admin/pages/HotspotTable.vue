<template>
<div>
  <table class="table">
      <caption>Manage hotspots</caption>
      <tr>
        <th></th>
        <th>Hotspot</th>
        <th>Type</th>
        <th>Link</th>
        <th>Button image</th>
        <th>Hotspot position</th>
      </tr>

      <tr v-for="item in table_rows" :key="item.id">
        <td>{{item.id}}</td>
        <td><span>from: </span><input value="00:00" type="time"  class="small" v-model="item.startTime" /> to: <input value="00:00" type="time" class="small" v-model="item.stopTime" /></td>
        <td>
            <label title='Link'>
              <input type="radio" v-model="item.option" :name="item.id" value="link" />
              <span>Link</span>
            </label><br>
            <label title='Product'>
              <input type="radio" v-model="item.option" :name="item.id" value="product" />
              <span>Product</span>
            </label><br>
            <label title='Page'>
              <input type="radio" v-model="item.option" :name="item.id" value="page" />
              <span>Page</span>
            </label><br>
            <label title='Hide'>
              <input type="radio" v-model="item.option" :name="item.id" value="hide" />
              <span>Hide</span>
            </label><br>
            <label title='Custom Product Hotspot'>
              <input type="radio" v-model="item.option" :name="item.id" value="custom-product" />
              <span>Custom product hotspot</span>
            </label>
        </td>
        <td class="td-link">
          <transition name="fade" mode="out-in">
            <input v-if="item.option == 'link'" type="text" v-model="item.value" value="" class="regular-text" />
            <select class="regular-text" v-if="item.option == 'page'" v-model="item.value">
              <option disabled value="">Please select page</option>
              <option v-for="page in pages" :key="page.ID" :value="page.guid"> {{ page.post_title }}</option>
            </select>
            <select class="regular-text" v-if="item.option == 'product'" v-model="item.value" @change="p123on_set_product_data($event.target.selectedIndex, item.id)">
              <option disabled value="">Please select product</option>
              <option v-for="product in products" :key="product.ID" :value="product.link"> {{ product.name }}</option>
            </select>
            <div class="custom-product" v-if="item.option == 'custom-product'" >
              <input type="text" v-model="item.custom_product.name" value="" placeholder="Product name" class="regular-text" />
              <input type="text" v-model="item.custom_product.price" value="" placeholder="Product price" class="regular-text" />
              <input type="text" v-model="item.custom_product.link" value="" placeholder="Product link" class="regular-text" /><br>
              <span><strong>Product image: </strong></span><br>
              <input type="file" value="" placeholder="Product link" class="regular-text" @change="p123on_get_image($event, item.id)"/><br>
              <img class="img-preview" :src="item.custom_product.image_url">
            </div>
          </transition>
        </td>
        <td>
          <label class="hotspot" title='hotspot white'>
            <input type="radio" v-model="item.btn_option" value="1" />
            <img class="hotspot__btn" src="@/../assets/img/hotspot-white-new.png" alt="button image 1">
          </label><br>
          <label class="hotspot" title='transparent hotspot'>
            <input type="radio" v-model="item.btn_option"  value="2" />
            <span class="transparent-hotspot"> Blank</span>
          </label><br>
          <label class="hotspot" title='hotspot white'>
            <input type="radio" v-model="item.btn_option"  value="3" />
            <img class="hotspot__btn" src="@/../assets/img/hotspot-white.png" alt="button image 3">
          </label><br>
        </td>
        <td>
          <draggable-hotspot
            v-if="item.btn_option != '2'"
            :video_url="video_url" 
            :position_x="item.position_x" 
            :position_y="item.position_y"
            @updatePositionX="updatePositionX(item.id, $event)"
            @updatePositionY="updatePositionY(item.id, $event)"
          />
   
        </td>
        <td></td>
      </tr>
    </table>

    <button class="button-primary" @click.stop='p123on_add_table_row()' >Add New Row</button>
    <button class="button-primary" @click.stop='p123on_remove_table_row()' >Remove Last Row</button>
    </div>
</template>

<script>
import axios from 'axios'
import DraggableHotspot from './DraggableHotspot.vue'

export default {
  name: 'Hotspot Table',
  props: ['table_rows', 'video_url'],
  components: { DraggableHotspot },
  data () {
    return {
      pages: [],
      products: [],
      data_to_upload: [],
    };
  },

  methods: {
    p123on_add_table_row()
    {
      this.table_rows.push(
        {
          "id": this.table_rows.length+1,
          "startTime": "",
          "stopTime": "",
          "option": 'link',
          "btn_option": "1",
          "value": "",
          "position_x": "50",
          "position_y": "50",
          "product_id": "",
          "custom_product": {name: "", price: "", link: "", image_url: ""}
        }
      )
    },
    p123on_remove_table_row()
    {
      this.table_rows.splice(this.table_rows.length-1, 1);
    },
    p123on_get_pages () {
      axios.get('/wp-json/v2/video_123on/pages')
          .then(response => {
            this.pages = response.data
          }).
      catch(error => {
        console.log(error);
      })
    },
    p123on_get_products() {
      axios.get('/wp-json/v2/video_123on/products')
          .then(response => {
            this.products = response.data;
          }).
      catch(error => {
        console.log(error);
      })
    },
    p123on_set_product_data(index, hotspotID)
    {
      this.table_rows[hotspotID-1].product_id = this.products[index-1].ID;
    },
    p123on_get_image(event, hotspotID)
    {
      const file = event.target.files[0];
      const data_to_upload = [];

      let form_data = new FormData();
      form_data.append('file', file);

      let config = {
          headers: {
            'X-WP-Nonce': wpApiSettings.nonce
          }
      }
      data_to_upload[0] = form_data;
      data_to_upload[1] = config;
      this.data_to_upload = data_to_upload;
      this.p123on_upload_image(hotspotID);
    },
    p123on_upload_image(hotspotID)
    {
      const API_URL = '/wp-json/wp/v2/media';

      return axios.post(
        API_URL,
        this.data_to_upload[0],
        this.data_to_upload[1]
      ).then(
        response => {
           this.table_rows[hotspotID-1].custom_product.image_url = response.data.guid.rendered;
        }
      )
    },
    updatePositionX(itemID, newPositionX) {
      this.table_rows[itemID-1].position_x = newPositionX;
    },
    updatePositionY(itemID, newPositionY) {
      this.table_rows[itemID-1].position_y = newPositionY;
    },
    test(itemID) {
      console.log(this.table_rows[itemID-1].position_x + ' ' + this.table_rows[itemID-1].position_y)
    }
  },
  mounted () {
    this.p123on_get_pages();
    this.p123on_get_products();
    this.table_rows.push(
      {
        "id": 1,
        "startTime": "",
        "stopTime": "",
        "option": 'link',
        "btn_option": "1",
        "value": "",
        "position_x": "50",
        "position_y": "50",
        "product_id": "",
        "custom_product": {name: "", price: "", link: "", image_url: ""}
      }
    )
  }
};
</script>

<style scoped lang="less">

.table
{
  background-color: #FFFFFF;
  margin-top: 20px;
  padding: 0px 10px;
  border-spacing: 0;
  border-collapse: collapse;
  width: 85vw;
}

.position {
  width: 20%;
  margin-bottom: 20px;
}

caption
{
  background-color: #FFFFFF;
  text-align: left;
  font-family: Open Sans;
  font-style: normal;
  font-weight: 600;
  font-size: 13px;
  line-height: 18px;
  padding: 16px 10px 5px 10px;
}

th
{
  text-align: left;
  font-weight: 400;
  padding: 10px;
  border: 1px solid #CDD0D4;
}

td
{
  border: 1px solid #CDD0D4;
  padding: 10px;
}

.td-link
{
  width: 29%;    
}

td:first-child
{
    background-color: #F4F4F4;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .3s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.button-primary
{
  margin: 20px 0px;
}
.hotspot {
  display: flex;
  align-items: center;

  &__btn
  {
    width: 40px;
    height: auto;
    margin-left: 5px;
  }
}

.transparent-hotspot {
  margin-left: 10px;
}

.custom-product
{
  input
  {
    margin: 5px 0px;
  }
}

.img-preview
{
  width: 50px;
  height: 50px;
  text-indent: -10000px
}
</style>
