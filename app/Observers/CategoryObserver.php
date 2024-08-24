<?php

namespace App\Observers;

use App\Models\category;

class CategoryObserver
{

    /**
     * Handle the category "created" event.
     */
    public function created(category $category): void
    {


        session()->flash('success' ,'با موفقیت ایجاد شد'.$category->title."دسته بندی");
    }

    /**
     * Handle the category "updated" event.
     */
    public function updated(category $category): void
    {
        session()->flash('success' ,'با موفقیت بروز شد'.$category->title."دسته بندی");
    }

    /**
     * Handle the category "deleted" event.
     */
    public function deleted(category $category): void
    {
        session()->flash('success' ,' با موفقیت حذف شد'.$category->title. "دسته بندی");
    }

    /**
     * Handle the category "restored" event.
     */
    public function restored(category $category): void
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     */
    public function forceDeleted(category $category): void
    {
        //
    }
}
