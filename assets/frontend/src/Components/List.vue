<template>
    <div>
        <div style="display: inline-block;">
            <p style="float: left; line-height: 35px">Anlagen insgesamt: {{items.length}}</p>
            <a v-on:click="addAnlage()" class="add-button"><i class="fas fa-plus-circle fa-2x"></i></a>
        </div>
        <div class="table-wrapper-scroll-y" style="height: 85%; margin-bottom: 10px">
            <table id="table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Optionen</th>
                    <th scope="col">Rekers Krannummer</th>
                    <th scope="col">Hersteller</th>
                    <th scope="col">Krantyp</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in items" v-on:click="rowClick(item, index, $event)">
                    <th scope="row">
                        <a class="button" v-on:click="deleteAnlage(item.id)"><i class="fas fa-trash"></i></a>
                        <a class="button"><i v-on:click="editAnlage(index)" class="fas fa-edit"></i></a>

                    </th>
                    <td>{{item.craneId ? item.craneId : "-"}}</td>
                    <td>{{item.manufactor ? item.manufactor : "-"}}</td>
                    <td>{{item.type ? item.type : "-"}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from "vue";
    import {Component} from "vue-property-decorator";
    import {AnlagenService} from "../Service/AnlagenService";
    import {DialogProvider} from "../Dialogs/DialogProvider";

    @Component
    export default class List extends Vue
    {
        edit: boolean = false;
        clickcont: number = 0;

        items: any = [];

        mounted()
        {
            this.loadData();
        }

        public loadData()
        {
            AnlagenService.getAnlagen().then((value: any) =>
            {
                console.log(value);
                this.items = value.data;
                this.$forceUpdate();

            }).catch((reason: any) =>
            {
                console.log(reason);
            });
        }

        public addAnlage()
        {
            DialogProvider.createWindowAnlage(() =>
            {
                this.loadData();
                this.$forceUpdate();
            });
        }

        public editAnlage(index: number)
        {
            DialogProvider.updateAnlage(this.items[index], () =>
            {
                this.loadData();
                this.$forceUpdate();
            });
        }

        public deleteAnlage(id: number)
        {
            AnlagenService.deleteAnlage(id);
            for (let i: number = 0; i < this.items.length; i++)
            {
                if (this.items[i].id === id)
                {
                    this.items.splice(i, 1);
                    break;
                }
            }
        }

        rowClick(record: any, index: any, $event: any)
        {
            console.log($event.target);
            this.clickcont++;
            if (this.clickcont == 1)
            {
                this.clickcont++;
                setTimeout(() =>
                {
                    this.clickcont = 0
                }, 200);
                //oneclick handle
                console.log("One click");
                let rows: any = (<any>document.getElementById("table"))["rows"];
                for (let i: number = 0; i < rows.length; i++)
                {
                    rows[i].classList.remove("table-primary");
                }
                if ($event.target.parentElement.tagName == "TR")
                    $event.target.parentElement.classList.add("table-primary");

                return;
            } else if (this.clickcont > 1)
            {
                //two click handle
                this.editAnlage(index);

                console.log("double click");
                this.clickcont = 0;
            }
        }
    }
</script>

<style>

    .button {
        cursor: pointer;
        color: red;
    }

    .add-button {
        float: right;
        cursor: pointer;
        margin-top: 2px;
        margin-left: 5px
    }
</style>