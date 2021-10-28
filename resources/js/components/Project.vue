<template>
    <a :href=infoUrlId class="d-flex flex-row col-8 mt-3 project justify-content-between">
        <div>
            <h5 class="project-title">{{ name }}</h5>
            <h6 class="project-description">{{ description }}</h6>
        </div>
        <div>
            <a :href=deleteUrlId v-if="this.isOwner" class="btn btn-outline-danger">Remove</a>
            <a :href=deleteUrlId v-else class="btn btn-outline-danger">Leave</a>
            <a href="/unselectProject" v-if="this.id == this.selected" class="btn btn-warning">Unselect</a>
            <a :href=selectUrlId v-else class="btn btn-outline-secondary">Select</a>
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
            deleteUrl: "/deleteProjectService/",
            selectUrl: "/selectProject/",
            infoUrl: "/projectPage/",
            selected: this.select,
        }
    },
    computed: {
        deleteUrlId: function () {
            return this.deleteUrl + this.id;
        },
        selectUrlId: function () {
            return this.selectUrl + this.id;
        },
        infoUrlId: function () {
            return this.infoUrl + this.id;
        },
        isOwner: function () {
            return this.role === "Owner";
        }
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
