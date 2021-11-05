<template>
    <a :href=infoUrlId class="d-flex flex-row col-8 mt-3 project justify-content-between">
        <div>
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h5 class="project-title">{{ name }}</h5>
            <h6 class="project-description">{{ description }}</h6>
        </div>
        <div>
            <a v-if="this.isOwner" @click="deleteProject" class="btn btn-outline-danger" >Remove</a>
            <a v-else @click="deleteProject" class="btn btn-outline-danger" >Leave</a>
            <a href="#"  v-if="this.id == this.selected" class="btn btn-warning" @click="unselectProject">Unselect</a>
            <a v-else @click="selectProject" class="btn btn-outline-secondary" >Select</a>
            <div class="d-flex flex-column mt-3">
                <h5><em class="text-success"><u><strong>Role:</strong></u></em> {{role}}</h5>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "Project",
    props: {
        id: "",
        name: "",
        description: "",
        select: String,
        role: ""
    },
    data() {
        return {
            infoUrl: "/selectAndOpenProjectPage/",
            selected: this.select,
        }
    },
    methods: {
        deleteProject: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/deleteProject',
                method: 'DELETE',
                data: {
                    'id': this.id
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/projects');
                }
            });
        },
        selectProject: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/selectProject',
                method: 'PUT',
                data: {
                    'id': this.id
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/projects');
                }
            });
        },
        unselectProject: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            $.ajax({
                url: '/unselectProject',
                method: 'PUT',
                data: {
                    'id': this.id
                },
                success: function () {
                    console.log("Success");
                    window.location.replace('http://docker.scrum-dashboard/projects');
                }
            });
        },
    },
    computed: {
        infoUrlId: function () {
            return this.infoUrl + this.id;
        },
        isOwner: function () {
            return this.role === "Owner";
        },
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }
}
</script>

<style scoped>
    .project {
        height: 7em;
        padding: 6px 6px 6px 15px;
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #74787e;
        text-decoration: none;
        color: #1b1e21;
    }

    .project-description {
        margin-top: 15px;
    }

    .project-title {
        margin-top: 10px;
    }
</style>
