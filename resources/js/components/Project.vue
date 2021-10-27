<template>
    <div class="d-flex flex-row col-8 mt-3 project justify-content-between">
        <div>
            <h5 class="project-title">{{ name }}</h5>
            <h6 class="project-description">{{ description }}</h6>
        </div>
        <div>
            <a :href=deleteUrlId class="btn btn-outline-danger">Remove</a>
            <a href="/unselectProject" v-if="this.id == this.selected" class="btn btn-warning">Unselect</a>
            <a :href=selectUrlId v-else class="btn btn-outline-secondary">Select</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Project",
    props: {
        id: "",
        name: "",
        description: "",
        select: String
    },
    data() {
        return {
            deleteUrl: "/deleteProjectService/",
            selectUrl: "/selectProject/",
            selected: this.select
        }
    },
    computed: {
        deleteUrlId: function () {
            return this.deleteUrl + this.id;
        },
        selectUrlId: function () {
            return this.selectUrl + this.id;
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
    }

    .project-description {
        margin-top: 15px;
    }

    .project-title {
        margin-top: 10px;
    }
</style>
