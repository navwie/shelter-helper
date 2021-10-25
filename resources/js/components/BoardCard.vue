<template>
    <div class="col-8 mt-3 card">
        <h5 class="card-name">{{ this.name }}</h5>
        <h6 class="card-description">{{ this.description }}</h6>
        <h6 :class="'deadline ' + this.checkDeadline">{{ this.formatDeadline }}</h6>
    </div>
</template>

<script>
import moment from "moment/moment";

export default {
    name: "BoardCard",
    props: {
        id: "",
        name: "",
        description: "",
        deadline: ""
    },
    computed: {
        formatDeadline: function () {
            return moment(this.deadline).format("MMMM Do YYYY, h:mm:a");
        },
        checkDeadline: function () {
            let deadlinePoint = moment(this.deadline);
            if (deadlinePoint.diff(moment()) < 0) {
                return "text-danger";
            } else {
                return "text-success";
            }
        }
    }
}
</script>

<style scoped>
    .card {
        height: auto;
        width: 97%;
        padding: 12px 6px 6px 15px;
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #74787e;
    }

    .card-description {
        margin-top: 15px;
    }
</style>
