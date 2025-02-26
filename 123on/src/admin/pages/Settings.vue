<template>
  <div class="app-settings">
    <h1>Settings</h1>
    <div class="settings-panel">
      <h2 class="hndle"><span>License</span></h2>
      <p>Fill in your license key in order to connect to 123on and access Pro features. If you don’t own a Pro license, please go to the page <a href="#"> details and pricing.</a></p>

      <div class="container">
        <div class="col-l"><h2 class="hndle"><span>License key</span></h2></div>

        <div class="col-r">
          <p>Heading</p>
          <input type="text" class="large-text"><br><br>
          <input class="button-primary" type="submit" name="Example" value="Inactivate license" />
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
export default {

  name: 'Settings',

  data () {
    return {

    };
  }
};
</script>

<style scoped>

.settings-panel
{
  background-color: #FFFFFF;
  margin-top: 10px;
  padding: 2px 15px 20px 15px;
  border: 1px solid #CDD0D4;
}

.container
{
  display: flex;
  flex-direction: row;
}

.col-l
{
  width: 10vw;
}

.col-r
{
  width: 50vw;
}

</style>
