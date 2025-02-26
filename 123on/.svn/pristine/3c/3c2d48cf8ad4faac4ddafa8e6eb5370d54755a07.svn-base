<template>
  <div>
    <div class="row">
      <h1>Video list</h1>
      <input class="button-secondary" @click="p123on_add_new()" type="submit" value="Add new" />
    </div>
    <p>This page shows an overview of the videos and projects you have created with 123on. On the far right you will find a section called “Shortcode”. Click on the icon to copy the shortcode, then paste it where you want to insert the video.</p>


    <div class="notice notice-success inline" v-if="notification != null">
        <p>{{notification}}</p>
    </div>

    <table class="table">
      <tr>
        <th><input name="" type="checkbox" /></th>
        <th><a class="header__title" @click="p123on_sort_table('title')">Title</a></th>
        <th>Length</th>
        <th>Type</th>
        <th>Shortcode</th>
      </tr>

      <tr v-for="item in posts" :key="item.id">
        <td><input name="" type="checkbox" /></td>
        <td>
          <a @click="p123on_edit_post(item)" class="title" href="#">{{item.title}}</a><br>
          <a @click="p123on_edit_post(item)" class="post__a" href="#">Edit</a>
          <a @click="p123on_delete_post(item.id)" class="erase" href="#">Delete</a>
        </td>
        <td>{{JSON.parse(item.duration)}}</td>
        <td>Hotspots</td>
        <td class="shortcode__table"><pre>[video_123on id="{{item.id}}"]</pre><button @click="p123on_copy_shortcode(item.id)" class="copy"><img src="@/../assets/img/copy.png"></button></td>
      </tr>

      <tr>
        <th><input name="" type="checkbox" /></th>
        <th><a @click="p123on_sort_table('title')">Title</a></th>
        <th>Length</th>
        <th>Type</th>
        <th>Shortcode</th>
      </tr>
    </table>

    <div class="tablenav-pages">
      <span class="displaying-num">{{this.pagination['number_of_posts']}} items</span>
      <button @click="p123on_first_page()" :class="{disabled : this.pagination['current_page'] == 1}" class='first-page button'>&laquo;</button>
      <button @click="p123on_prev_page()" :class="{disabled : this.pagination['current_page'] == 1}" class='prev-page button'>&lsaquo;</button>
      <span class="tablenav-paging-text"><span class='current-page'>{{this.pagination['current_page']}}</span> of <span class='total-pages'>{{this.pagination['number_of_pages']}}</span></span>
      <button @click="p123on_next_page()" :class="{disabled : this.pagination['current_page'] == this.pagination['number_of_pages']}" class='next-page button'>&rsaquo;</button>
      <button @click="p123on_last_page()" :class="{disabled : this.pagination['current_page'] == this.pagination['number_of_pages']}" class='last-page button'>&raquo;</button>
	  </div>
  </div>
</template>

<script>
import axios from 'axios'

export default{
  name: 'Home',

  data () {
    return {
      posts_url: '/wp-json/v2/video_123on',
      posts: [],
      pagination: [],
      sort_asc: false,
      notification: this.$route.params.message,
    }
  },
  methods:
  {
    p123on_add_new()
    {
      this.$router.push('/add-new');
    },

    p123on_get_posts(page_number)
    {
      axios.get('/wp-json/v2/video_123on/' + page_number)
      .then(response => {
        this.posts = response.data[0];
        this.pagination = response.data[1];
      }).
      catch(error => {
        console.log(error);
      })
    },

    p123on_next_page()
    {
      if(!(this.pagination['current_page'] == this.pagination['number_of_pages'])){
      this.p123on_get_posts(parseInt(this.pagination['current_page']) + parseInt(1))
      }
    },

    p123on_last_page()
    {
      this.p123on_get_posts(this.pagination['number_of_pages']);
    },

    p123on_prev_page()
    {
      if((this.pagination['current_page'] != 1)){
        this.p123on_get_posts(parseInt(this.pagination['current_page']) - parseInt(1))
      }
    },
    
    p123on_first_page()
    {
      this.p123on_get_posts(1);
    },

    p123on_delete_post(id)
    {
      if(confirm("Do you want to delete post?"))
      {
        axios.delete('/wp-json/v2/video_123on/delete/' + id)
        .then(response => {
        }).
        catch(error => {
          console.log(error);
        });
        this.notification = 'Video removed';
        setTimeout(() => this.p123on_get_posts(1), 500);
      }
    },

    p123on_edit_post(post)
    {
      this.$router.push({
      name: 'Edit',
      params: { post: post}
    });
    },

    p123on_copy_shortcode(shortcode){
        var textarea = document.createElement("textarea");
        var textToCopy = '[video_123on id="' + shortcode + '"]';
        document.body.appendChild(textarea);
        textarea.value = textToCopy;
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
    },

    p123on_sort_table (property) {
      if (!property)
        return
      this.sort_asc = !this.sort_asc
      if (this.sort_asc)
        this.posts = this.posts.sort((a, b) => a[property].localeCompare(b[property]));
      else
        this.posts = this.posts.sort((b, a) => a[property].localeCompare(b[property]));
    },
  },
  mounted(){
    this.p123on_get_posts(1);
  },
  created(){
    this.p123on_get_posts(1);
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.row
{
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-top: 30px;
}

.row h1
{
  margin-right: 20px;
  padding: unset;
  line-height: unset;
}

.table
{
  background-color: #FFFFFF;
  width: 100%;
  margin-top: 20px;
  padding: 0px 10px;
  border-spacing: 0;
  border-collapse: collapse;
}

.tablenav-pages
{
  display: flex;
  align-items: center;
  float: right;
  margin-top: 20px;
}

.tablenav-pages button
{
  margin-left: 5px;
  margin-right: 5px;
}

.title
{
  font-weight: 600;
  font-size: 14px;
}

.erase
{
  color: #9C1F14;
}

.post__a
{
  margin-right: 10px;
  font-size: 12px;
}

th
{
  font-weight: 500;
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #CDD0D4;
}

td
{
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #CDD0D4;
    background-color: #F6F7F7;
}

td:nth-child(1)
{
  width: 2%;
}

td:nth-child(2)
{
  width: 18%;
}

td:nth-child(3)
{
  width: 18%;
}

td:nth-child(4)
{
  width: 18%;
}

td:nth-child(6)
{
  width: 18%;
}

.shortcode__table
{
  display: flex;
}

.copy
{
  background-color: transparent;
  padding: 0px;
  border: none;
  cursor: pointer;
  margin-left: 10px;
  
}

a
{
  text-decoration: none;
  font-weight: 600;
}

.header__title
{
  cursor: pointer;
}


</style>