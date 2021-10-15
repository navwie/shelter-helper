<template>
    <div class="d-flex flex-column align-items-center">
<!--<form class="col-4 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-4" action="/searchProjectService">
            <div class="d-flex flex-row">
                <input type="search" class="form-control" placeholder="Search..." name="search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>-->
        <div class="col-8 mt-5">
            <h5 class="projects-header">Projects {{ this.userProjects.length }}</h5>
        </div>
        <project
            v-for="project in this.userProjects"
            :key="project.index"
            :id="project.id"
            :name="project.name"
            :description="project.description"
        />
        <div>
            <a class="btn btn-outline-dark" href="/createProject">
                Create project
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Projects",
    props: {
        projects: [],
        user: ""
    },
    computed: {
        userProjects: function () {
            return this.projects.filter(project => project.author_id === this.user);
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

    .projects-header {
        margin-left: 15px;
    }

    .project-description {
        margin-top: 15px;
    }

    .project-title {
        margin-top: 10px;
    }

    .btn-outline-dark {
        position: fixed;
        padding-top: 10px;
        bottom: 15%;
        right: 20%;
        height: 3em;
        border-radius: 25px;
        font-weight: 500;
    }
</style>
