<template>
    <div class="page">
        <div class="form-group">
            <label for="topic">{{$t("form.topicAnnouncement")}}</label>
            <input type="text" class="form-control" id="topic" name="topic" :value=topic>
        </div>
       <div class="form-group">
           <label for="description">{{$t("form.descriptionAnnouncement")}}</label>
           <textarea type="text" class="form-control" id="description" name="description" :value="description"  />
       </div>
        <a :href=deleteUrl class="btn btn-primary">{{$t("form.deleteBtn")}}</a>
    </div>
</template>

<script>
export default {
    name: "AnnouncementCard",
    props: {
        id: '',
        topic: '',
        description: ''
    },
    computed: {
        deleteUrl: function () {
            return `/deleteAnnouncement/${this.id}`;
        }
    }
}
</script>

<style scoped>
    .page{
        margin: 40px auto;
        width: 550px;
        height: 400px;
        padding: 5px 20px 40px 20px;
        background:#D1E8E2;
        border-radius: 40px;
        position: relative;
        text-shadow: none;
        box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
        margin-bottom: 90px;
    }
    h1{
        color:#000;
        font-size: 30px;
        font-family: 'Titillium Web', sans-serif;
        font-weight: 700;
    }
    .form-group{
        display:flex;
        flex-direction:column;
    }
    .form-group label{
        margin-top: 10px;
        margin-left: 30px;
        color:#2C3531;
        position: relative;
        font-weight: 400;
        font-family: 'Montserrat', sans-serif;
        font-size: 26px;
    }
    .btn{
        position:relative;
        margin-left:160px;
        margin-top: 20px;
        width: 150px;
        font-family: 'Montserrat', sans-serif;
        font-size: 19px;
        border-radius:10px;
    }
    textarea{
        margin-left: 30px;
        height : 160px;
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        width:440px;
        padding: 5px 5px 5px 15px;
        border-color:#ccc;
        border-radius: 20px;
        position: relative;
    }
    input{
        margin-left: 30px;
        width:440px;
        padding: 5px 5px 5px 15px;
        border-color:#ccc;
        border-radius: 20px;
        position: relative;
        background-color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 24px;
    }
</style>
