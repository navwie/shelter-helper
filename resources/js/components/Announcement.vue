<template>
    <div class="sign-page">
        <h2 class="title text-center" >Ваші об'яви</h2>
        <a class="btn text-center btn-primary" href="/createAnnouncement">Додати об'яву</a>
        <div class="card-ann">
            <announcement-card
                v-for="announcement in this.announcementsData"
                :key="announcement.index"
                :id="announcement.id"
                :topic="announcement.Topic"
                :description="announcement.Description"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "Announcement",
    props: {
        announcements: {}
    },
    data() {
        return {
            announcementsData: JSON.parse(this.announcements),
        }
    }
}
</script>

<style scoped>
h2{
    font-family: 'Montserrat', sans-serif;
    font-size:40px;
    margin: 40px 0 30px;
}
.btn{
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    width: 250px;
    margin-left: 800px;
    border-radius: 10px;
}
.card-ann{
    display: flex;
    flex-wrap:wrap;
}
</style>
