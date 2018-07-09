<template>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row head-page">
        <div class="col-md-12 col-sm-12">
          <h2 class="Ubah-Password">Change Password</h2>
            <form class="pas" @submit.prevent="save">
                <div class="col-md-6 col-sm-6">
                    <div class="form-pass">
                        <div class="styled-input agile-styled-input-top">
                            <input type="password" name="password" v-model="password">
                            <label>Password</label>
                            <span></span>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="password" name="newpassword" v-model="newpassword">
                            <label>New Password</label>
                            <span></span>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="password" name="confirmpassword" v-model="confirmpassword">
                            <label>Confirm Password</label>
                            <span></span>
                        </div>
                        <button type="submit" class="btn Button-Save"><p class="Edit-Profile">Save <img src="../img/check.svg" class="Write"></p></button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>

