<template>
    <div>
        <div class="notification">
            <notify-create-project
                v-for="notification in this.create_project_notifications"
                :key="notification.id"
                :id="notification.id"
                :data="notification.data"
            />
          <notify-delete-project
                v-for="notification in this.delete_project_notifications"
                :key="notification.id"
                :id="notification.id"
                :data="notification.data"
            />
        </div>

        <div class="d-flex flex-column align-items-center">
            <!--<form class="col-4 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-4" action="/searchProjectService">
                        <div class="d-flex flex-row">
                            <input type="search" class="form-control" placeholder="Search..." name="search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>-->
            <div v-if="this.userProjects.length !== 0" class="col-8 mt-5">
                <h5 class="projects-header">Projects {{ this.userProjects.length }}</h5>
            </div>

            <project
                v-for="project in this.userProjects"
                :key="project.index"
                :id="project.id"
                :name="project.name"
                :description="project.description"
                :select="project.select"
            />
            <not-such-projects v-if="userProjects.length === 0" />

            <div>
                <a class="btn btn-outline-dark" href="/createProject">
                    Create project
                </a>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    name: "Projects",
    data() {
        return {
            show: false,
            projectsData: this.projects
        }
    },
    props: {
        projects: [],
        user: "",
        select: {
            Number
        },
        create_project_notifications: [],
        delete_project_notifications: [],
    },
    computed: {
        userProjects: function () {
            this.projectsData.map(project => project['select'] = this.select);
            return this.projectsData.filter(project => project.author_id === this.user);
        },
        selected: function () {
            return this.select;
        }
    }
}
</script>

<style scoped>
    .notification {
        position: fixed;
        top: 80px;
        right: 16px;
        z-index: 15;
        font-size: large;
    }
    .projects-header {
        margin-left: 15px;
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
