
<template>
    <div class="form-group row">
        <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>
        <div class="col-md-6">
            <select id="Category" type="text" class="form-control" name="category"  autocomplete="password" v-on:change="$emit('change',$event.target.value)">
                <option 
                v-for="(category, index) in allCategories" 
                :key="index" 
                :value="category.id" 
                :selected="category.id === current.id ? true : false">
                    {{category.screen_name}}
                </option>
            </select>
        </div>
    </div>

</template>

<script>
import axios from 'axios';
import {GET_CATEGORIES} from '../endpoints/endpoints';
export default {
    model: {
        prop: 'value',
        event: 'change'
    },
    props: {
        currentCategory: {
            type: Number, 
            required: true,
            default: 1
        }
    },
    data () {
        return {
            categories: [],
            current: {},
        };
    },
    methods: {
        getCategories(){
            axios.get(GET_CATEGORIES).then(({data: {data}}) => {
                this.categories = data;
            });
        },
        setCurrentCategory() {
           this.current = this.allCategories.filter(category => {
                if(category.id === this.currentCategoryId){
                    return
                }
            })
        },
        getCurrentCategory(){
            this.current = this.categories.filter(category => {
                // console.log(category);
                // TODO
                if(category.id === this.currentCategoryId){
                    return category;
                };
            });
        },

    },
    mounted () {
        this.getCategories();
        this.setCurrentCategory();

    },
    computed : {
        currentCategoryId: function () {
            return this.currentCategory;
        },
        allCategories: function () {
            return this.categories;
        }
    } 
};
</script>