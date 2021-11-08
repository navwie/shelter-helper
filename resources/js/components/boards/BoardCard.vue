<template>
    <div class="col-8 mt-3 card">
        <input type="hidden" name="_token" :value="this.csrfToken">
        <div class="delete-card">
            <a href="#" class="text-decoration-none text-black" @click="deleteCard">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                </svg>
            </a>
        </div>

        <div class="edit-card">
            <a :href="editCard" class="text-decoration-none text-black-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>
        </div>

        <h5 class="card-name">{{ this.name }}</h5>
        <h6 class="card-description">{{ this.description }}</h6>
        <h6 :class="'deadline mt-2 ' + this.checkDeadline">{{ this.formatDeadline }}</h6>
        <div class="d-flex flex-row">
            <h6 class="mt-3">Workers: &nbsp</h6>
            <div class="d-flex flex-row mt-3" v-if="this.assignUser !== undefined">
                <h6>
                    <em>{{ this.assignUser['name'] }}</em>
                    <em>{{ this.assignUser['surname'] }}</em>
                </h6>

                <a href="#" @click="deleteAssign" class="text-decoration-none text-black">
                    <svg data-v-5c9575ff="" xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" viewBox="0 0 16 16" preserveAspectRatio="xMinYMin meet" class="bi bi-person-dash">
                        <g data-v-5c9575ff="" transform="translate(4,-2)">
                            <path data-v-5c9575ff="" d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                            <path data-v-5c9575ff="" fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"></path>
                        </g>
                    </svg>
                </a>

            </div>

            <div v-else>
                <a :href="assignUserLink" class="assign-user text-black">
                    <svg width="1.2em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0,4)">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
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
        deadline: "",
        assign_users: []
    },
    methods: {
        deleteCard: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/deleteCard',
                method: 'DELETE',
                data: {
                    'id': this.id
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/board');
                }
            });
        },
        deleteAssign: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/deleteAssign',
                method: 'DELETE',
                data: {
                    'id': this.id
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/board');
                }
            });
        },
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
        },
        assignUser: function () {
            return  this.assign_users.find(user => user.card_id === this.id);
        },
        assignUserLink: function () {
            return "/assignUser/" + this.id;
        },
        editCard: function () {
            return '/editCard/' + this.id;
        },
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
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

    .assign-user {
        margin-top: 1.5em;
        border: none;
        width: 97%;
    }

    .delete-card {
        position: absolute;
        top: 0;
        right: 5px;
    }

    .edit-card {
        position: absolute;
        bottom: 7px;
        right: 7px;
        color: black;
    }
</style>
