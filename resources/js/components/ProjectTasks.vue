<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><strong>{{project.name}}</strong></h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <draggable v-model="tasks">
                                <transition-group>
                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                        :options="{animation:200}" v-for="element  in tasks"
                                        :key="element.id"
                                        @change="updatePriority"
                                        @end="updateDataBase">
                                        <div>
                                            {{element.name}}
                                        </div>
                                        <div>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </li>
                                </transition-group>
                            </draggable>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },
        data: function () {
            return {
                tasks: [],
            }
        },
        methods: {
            updatePriority() {
                this.tasks.map((task, index) => {
                    task.priority = index + 1;
                });
            },
            updateDataBase() {

            }
        },
        props: ['project'],
        mounted() {
            console.log(this.project);
            this.tasks = this.project.tasks;
        }
    }
</script>
<style scoped>
    .list-group-item {
        margin: 5px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    .list-group-item:hover {
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    .card-body {
        background-color: #e2e1e0;
    }
</style>
