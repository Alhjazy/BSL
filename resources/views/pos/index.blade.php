@extends('layouts.pos')
@section('content')
<style>
    @charset "UTF-8";
    @import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");
    * {
        box-sizing: border-box;
    }
    html body{
        padding:0;
    }
    .app{
        padding:0;
    }
    :root {
        --app-container: #f3f6fd;
        --main-color: #1f1c2e;
        --secondary-color: #4A4A4A;
        --link-color: #1f1c2e;
        --link-color-hover: #c3cff4;
        --link-color-active: #fff;
        --link-color-active-bg: #1f1c2e;
        --projects-section: #fff;
        --message-box-hover: #fafcff;
        --message-box-border: #e9ebf0;
        --more-list-bg: #fff;
        --more-list-bg-hover: #f6fbff;
        --more-list-shadow: rgba(209, 209, 209, 0.4);
        --button-bg: #1f1c24;
        --search-area-bg: #fff;
        --star: #1ff1c2e;
        --message-btn: #fff;
    }

    .dark:root {
        --app-container: #1f1d2b;
        --main-color: #fff;
        --secondary-color: rgba(255,255,255,.8);
        --projects-section: #252836;
        --link-color: rgba(255,255,255,.8);
        --link-color-hover: rgba(195, 207, 244, 0.1);
        --link-color-active-bg: rgba(195, 207, 244, 0.2);
        --button-bg: #2f3142;
        --search-area-bg: #2f3142;
        --message-box-hover: #303446;
        --message-box-border: rgba(255,255,255,.1);
        --star: #ffd92c;
        --light-font: rgba(255,255,255,.8);
        --more-list-bg: #2f3142;
        --more-list-bg-hover: rgba(195, 207, 244, 0.1);
        --more-list-shadow: rgba(195, 207, 244, 0.1);
        --message-btn: rgba(195, 207, 244, 0.1);
    }

    html, body {
        width: 100%;
        height: 100vh;
        margin: 0;
    }

    body {
        font-family: "DM Sans", sans-serif;
        overflow: hidden;
    }

    button, a {
        cursor: pointer;
    }

    .app-container {
        width: 100%;
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: var(--app-container);
        transition: 0.2s;
    }
    .app-content {
        display: flex;
        height: 100%;
        overflow: hidden;
        padding: 0px 10px 0 0;
    }
    .app-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 16px 24px;
        position: relative;
    }
    .app-header-left, .app-header-right {
        display: flex;
        align-items: center;
    }
    .app-header-left {
        flex-grow: 1;
    }
    .app-header-right button {
        margin-left: 10px;
    }
    .app-icon {
        width: 26px;
        height: 2px;
        border-radius: 4px;
        background-color: var(--main-color);
        position: relative;
    }
    .app-icon:before, .app-icon:after {
        content: "";
        position: absolute;
        width: 12px;
        height: 2px;
        border-radius: 4px;
        background-color: var(--main-color);
        left: 50%;
        transform: translatex(-50%);
    }
    .app-icon:before {
        top: -6px;
    }
    .app-icon:after {
        bottom: -6px;
    }
    .app-name {
        color: var(--main-color);
        margin: 0;
        font-size: 20px;
        line-height: 24px;
        font-weight: 700;
        margin: 0 32px;
    }

    .mode-switch {
        background-color: transparent;
        border: none;
        padding: 0;
        color: var(--main-color);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-wrapper {
        border-radius: 20px;
        background-color: var(--search-area-bg);
        padding-right: 12px;
        height: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 67%;
        max-width: 480px;
        color: var(--light-font);
        box-shadow: 0 2px 6px 0 rgba(136, 148, 171, 0.2), 0 24px 20px -24px rgba(71, 82, 107, 0.1);
        overflow: hidden;
    }
    .dark .search-wrapper {
        box-shadow: none;
    }

    .search-input {
        border: none;
        flex: 1;
        outline: none;
        height: 100%;
        padding: 0 20px;
        font-size: 16px;
        background-color: var(--search-area-bg);
        color: var(--main-color);
    }
    .search-input:placeholder {
        color: var(--main-color);
        opacity: 0.6;
    }

    .add-btn {
        color: #fff;
        background-color: var(--button-bg);
        padding: 0;
        border: 0;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notification-btn {
        color: var(--main-color);
        padding: 0;
        border: 0;
        background-color: transparent;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-btn {
        padding: 0;
        border: 0;
        background-color: transparent;
        display: flex;
        align-items: center;
        padding-left: 12px;
        border-left: 2px solid #ddd;
    }
    .profile-btn img {
        width: 32px;
        height: 32px;
        -o-object-fit: cover;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 4px;
    }
    .profile-btn span {
        color: var(--main-color);
        font-size: 16px;
        line-height: 24px;
        font-weight: 700;
    }

    .page-content  {
        flex: 1;
        width: 100%;
    }

    .app-sidebar {
        padding: 40px 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .app-sidebar-link {
        color: var(--main-color);
        color: var(--link-color);
        margin: 16px 0;
        transition: 0.2s;
        border-radius: 25%;
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .app-sidebar-link:hover {
        background-color: var(--link-color-hover);
        color: var(--link-color-active);
    }
    .app-sidebar-link.active {
        background-color: var(--link-color-active-bg);
        color: var(--link-color-active);
    }

    .projects-section {
        flex: 1.7;
        /*background-color: var(--projects-section);*/
        /*border-radius: 32px;*/
        /*padding: 32px 32px 0 32px;*/
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .projects-section-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 32px;
    }
    .projects-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        color: var(--main-color);
    }
    .projects-section-header p {
        font-size: 24px;
        line-height: 32px;
        font-weight: 700;
        opacity: 0.9;
        margin: 0;
        color: var(--main-color);
    }
    .projects-section-header .time {
        font-size: 20px;
    }

    .projects-status {
        display: flex;
    }

    .item-status {
        display: flex;
        flex-direction: column;
        margin-right: 16px;
    }
    .item-status:not(:last-child) .status-type:after {
        content: "";
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translatey(-50%);
        width: 6px;
        height: 6px;
        border-radius: 50%;
        border: 1px solid var(--secondary-color);
    }

    .status-number {
        font-size: 24px;
        line-height: 32px;
        font-weight: 700;
        color: var(--main-color);
    }

    .status-type {
        position: relative;
        padding-right: 24px;
        color: var(--secondary-color);
    }

    .view-actions {
        display: flex;
        align-items: center;
    }

    .view-btn {
        width: 36px;
        height: 36px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px;
        border-radius: 4px;
        background-color: transparent;
        border: none;
        color: var(--main-color);
        margin-left: 8px;
        transition: 0.2s;
    }
    .view-btn.active {
        background-color: var(--link-color-active-bg);
        color: var(--link-color-active);
    }
    .view-btn:not(.active):hover {
        background-color: var(--link-color-hover);
        color: var(--link-color-active);
    }

    .messages-section {
        flex-shrink: 0;
        /*padding-bottom: 32px;*/
        /*background-color: var(--projects-section);*/
        margin-left: 24px;
        flex: 1;
        width: 100%;
        /*border-radius: 30px;*/
        position: relative;
        overflow: hidden;
        transition: all 300ms cubic-bezier(0.19, 1, 0.56, 1);
    }
    .messages-section .messages-close {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 3;
        border: none;
        background-color: transparent;
        color: var(--main-color);
        display: none;
    }
    .messages-section.show {
        transform: translateX(0);
        opacity: 1;
        margin-left: 0;
    }
    .messages-section .projects-section-header {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1;
        padding: 32px 24px 0 24px;
        background-color: var(--projects-section);
    }

    .message-box {
        border-top: 1px solid var(--message-box-border);
        padding: 16px;
        display: flex;
        align-items: flex-start;
        width: 100%;
    }
    .message-box:hover {
        background-color: var(--message-box-hover);
        border-top-color: var(--link-color-hover);
    }
    .message-box:hover + .message-box {
        border-top-color: var(--link-color-hover);
    }
    .message-box img {
        border-radius: 50%;
        -o-object-fit: cover;
        object-fit: cover;
        width: 40px;
        height: 40px;
    }

    .message-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    .message-header .name {
        font-size: 16px;
        line-height: 24px;
        font-weight: 700;
        color: var(--main-color);
        margin: 0;
    }

    .message-content {
        padding-left: 16px;
        width: 100%;
    }

    .star-checkbox input {
        opacity: 0;
        position: absolute;
        width: 0;
        height: 0;
    }
    .star-checkbox label {
        width: 24px;
        height: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .dark .star-checkbox {
        color: var(--secondary-color);
    }
    .dark .star-checkbox input:checked + label {
        color: var(--star);
    }
    .star-checkbox input:checked + label svg {
        fill: var(--star);
        transition: 0.2s;
    }

    .message-line {
        font-size: 14px;
        line-height: 20px;
        margin: 8px 0;
        color: var(--secondary-color);
        opacity: 0.7;
    }
    .message-line.time {
        text-align: right;
        margin-bottom: 0;
    }

    .project-boxes {
        margin: 0 -8px;
        overflow-y: auto;
    }
    .project-boxes.jsGridView {
        display: flex;
        flex-wrap: wrap;
    }
    .project-boxes.jsGridView .project-box-wrapper {
        width: 31%;
        display:grid;
    }
    .project-boxes.jsListView .project-box {
        display: flex;
        border-radius: 10px;
        position: relative;
    }
    .project-boxes.jsListView .project-box > * {
        margin-right: 24px;
    }
    .project-boxes.jsListView .more-wrapper {
        position: absolute;
        right: 16px;
        top: 16px;
    }
    .project-boxes.jsListView .project-box-content-header {
        order: 1;
        max-width: 120px;
    }
    .project-boxes.jsListView .project-box-header {
        order: 2;
    }
    .project-boxes.jsListView .project-box-footer {
        order: 3;
        padding-top: 0;
        flex-direction: column;
        justify-content: flex-start;
    }
    .project-boxes.jsListView .project-box-footer:after {
        display: none;
    }
    .project-boxes.jsListView .participants {
        margin-bottom: 8px;
    }
    .project-boxes.jsListView .project-box-content-header p {
        text-align: left;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .project-boxes.jsListView .project-box-header > span {
        position: absolute;
        bottom: 16px;
        left: 16px;
        font-size: 12px;
    }
    .project-boxes.jsListView .box-progress-wrapper {
        order: 3;
        flex: 1;
    }

    .project-box {
        --main-color-card: #9e9e9e;
        border-radius:4%;
        /*padding: 16px;*/
    }
    .project-box-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        
        /*margin-bottom: 16px;*/
        color: var(--main-color);
    }
    .project-box-header span {
        color: #4A4A4A;
        opacity: 0.7;
        font-size: 14px;
        line-height: 16px;
    }
    .project-box-content-header {
        text-align: center;
        margin-bottom: 16px;
    }
    .project-box-content-header p {
        margin: 0;
    }
    .project-box-wrapper {
        margin: 1%;
        transition: 0.2s;
    }

    .project-btn-more {
        padding: 0;
        height: 14px;
        width: 24px;
        height: 24px;
        position: relative;
        background-color: transparent;
        border: none;
        flex-shrink: 0;
        /*&:after, &:before {
          content: '';
          position: absolute;
          width: 6px;
          height: 6px;
          border-radius: 50%;
          background-color: var(--main-color);
          opacity: .8;
          left: 50%;
          transform: translatex(-50%);
        }

        &:before { top: 0;}
        &:after { bottom: 0; }*/
    }

    .more-wrapper {
        position: relative;
    }

    .box-content-header {
        font-size: 16px;
        line-height: 24px;
        font-weight: 700;
        opacity: 0.7;
    }

    .box-content-subheader {
        font-size: 14px;
        line-height: 24px;
        opacity: 0.7;
    }

    .box-progress {
        display: block;
        height: 4px;
        border-radius: 6px;
    }
    .box-progress-bar {
        width: 100%;
        height: 4px;
        border-radius: 6px;
        overflow: hidden;
        background-color: #fff;
        margin: 8px 0;
    }
    .box-progress-header {
        font-size: 14px;
        font-weight: 700;
        line-height: 16px;
        margin: 0;
    }
    .box-progress-percentage {
        text-align: right;
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        line-height: 16px;
    }

    .project-box-footer {
        display: flex;
        justify-content: space-between;
        /*padding-top: 16px;*/
        position: relative;
        bottom: 7px;
    }
    .project-box-footer:after {
        content: "";
        position: absolute;
        /*background-color: rgba(255, 255, 255, 0.6);*/
        width: calc(100% + 32px);
        top: 0;
        left: -16px;
        height: 1px;
    }

    .participants {
        display: flex;
        align-items: center;
    }
    .participants2 {
        display: block;
        align-items: center;
        width: 100%;
    }
    .participants img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        overflow: hidden;
        -o-object-fit: cover;
        object-fit: cover;
    }
    .participants img:not(:first-child) {
        margin-left: -8px;
    }

    .add-participant {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: none;
        background-color: rgba(255, 255, 255, 0.6);
        margin-left: 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .days-left {
        background-color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        /*border-radius: 20px;*/
        flex-shrink: 0;
        padding: 6px 6px;
        font-weight: 700;
    }

    .mode-switch.active .moon {
        fill: var(--main-color);
    }

    .messages-btn {
        border-radius: 4px 0 0 4px;
        position: absolute;
        right: 0;
        top: 58px;
        background-color: var(--message-btn);
        border: none;
        color: var(--main-color);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 4px;
        display: none;
    }

    @media screen and (max-width: 980px) {
        .project-boxes.jsGridView .project-box-wrapper {
            width: 50%;
        }

        .status-number, .status-type {
            font-size: 14px;
        }

        .status-type:after {
            width: 4px;
            height: 4px;
        }

        .item-status {
            margin-right: 0;
        }
    }
    @media screen and (max-width: 880px) {
        .messages-section {
            transform: translateX(100%);
            position: absolute;
            opacity: 0;
            top: 0;
            z-index: 2;
            height: 100%;
            width: 100%;
        }
        .messages-section .messages-close {
            display: block;
        }

        .messages-btn {
            display: flex;
        }
    }
    @media screen and (max-width: 720px) {
        .app-name, .profile-btn span {
            display: none;
        }

        .add-btn, .notification-btn, .mode-switch {
            width: 20px;
            height: 20px;
        }
        .add-btn svg, .notification-btn svg, .mode-switch svg {
            width: 16px;
            height: 16px;
        }

        .app-header-right button {
            margin-left: 4px;
        }
    }
    @media screen and (max-width: 520px) {
        .projects-section {
            overflow: auto;
        }

        .project-boxes {
            overflow-y: visible;
        }

        .app-sidebar, .app-icon {
            display: none;
        }

        .app-content {
            padding: 16px 12px 24px 12px;
        }

        .status-number, .status-type {
            font-size: 10px;
        }

        .view-btn {
            width: 24px;
            height: 24px;
        }

        .app-header {
            padding: 16px 10px;
        }

        .search-input {
            max-width: 120px;
        }

        .project-boxes.jsGridView .project-box-wrapper {
            width: 100%;
        }

        .projects-section {
            padding: 24px 16px 0 16px;
        }

        .profile-btn img {
            width: 24px;
            height: 24px;
        }

        .app-header {
            padding: 10px;
        }

        .projects-section-header p,
        .projects-section-header .time {
            font-size: 18px;
        }

        .status-type {
            padding-right: 4px;
        }
        .status-type:after {
            display: none;
        }

        .search-input {
            font-size: 14px;
        }

        .messages-btn {
            top: 48px;
        }

        .box-content-header {
            font-size: 12px;
            line-height: 16px;
        }

        .box-content-subheader {
            font-size: 10px;
            line-height: 16px;
        }

        .project-boxes.jsListView .project-box-header > span {
            font-size: 10px;
        }

        .box-progress-header {
            font-size: 12px;
        }

        .box-progress-percentage {
            font-size: 10px;
        }

        .days-left {
            font-size: 8px;
            padding: 6px 6px;
            text-align: center;
        }

        .project-boxes.jsListView .project-box > * {
            margin-right: 10px;
        }

        .project-boxes.jsListView .more-wrapper {
            right: 2px;
            top: 10px;
        }

    }
    li {
        padding: 0 !important;
    }
    li .wrapper {
        display: block;
        height: 100%;
        width: auto;
        position: relative;
        -webkit-transition: -webkit-transform 300ms ease;
        -moz-transition: -moz-transform 300ms ease;
        transition: transform 300ms ease;
    }
    .wrapper .go, .wrapper .item, .wrapper .del {
        display: inline-block;
        padding: 0.9em;
        text-shadow: none;
        border-style: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .wrapper .item {
        width: 100%;
        height: 100%;
    }
    .wrapper .go, .wrapper .del {
        height: 100%;
        text-align:center;
        font-weight: bold;
        border-width: 1px 0;
        border-style: solid;
        border-color: #ddd;
    }
    .wrapper .go {
        background: #009925;
        border-color: #009925;
    }
    .wrapper .del {
        background: #F90101;
        border-color: #F90101;
    }
    .POS_btn{
        display: inline-block;
        height: 71px;
        width: 70px;
        margin-left: 1px;
        border-radius: 4px;
        font-weight: bold;
    }
    #delete_item:disabled{
        background: #9E9E9E;
        cursor: not-allowed;
    }

   .buttons {
        display: grid;
        height: 47.2vh;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr;
        background: #d5d5d5;
    }
   .buttons2 {
        display: grid;
        height: 54vh;
        grid-template-columns: 1fr 1fr 1fr 1fr ;
        grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
    }
   .buttons button {
        background-color: #eeeeee;
        padding: 0;
        margin: 0.5px;
        border: 0;
        border-radius: 2px;
    }
   .buttons :hover {
        background-color: #d5d5d5;
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        /* border: 1px solid #aaa; */
        border-radius: 4px;
        height: 40px;
    }
    .num{
        color:#0c0c0c;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 43px;
        margin-left: 10px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 8px;
        right: 7px;
        width: 20px;
    }
</style>
<div class="app-container">
    <div class="app-header">
        <div class="app-header-left">
            <span class="app-icon"></span>
            <p class="app-name">POS</p>
        </div>
        <div class="app-header-right">
            <div class="flex mr-5" >
                <div class="z-30 rounded-l w-20  flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">INVOICE</div>
                <input type="text"  name="invoice_no" class=" input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border" placeholder="No#...">
            </div>
            <div class="flex mr-5" >
                <div class="z-30 rounded-l w-24 h-10  flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">CUSTOMER</div>
                <select name="customer_id" id="customer_id" class="tail-select customer_id w-40 h-16" >
                    @if($customers) @foreach($customers as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach @endif
                </select>
                <a  href="javascript:;" data-toggle="modal" data-target="#supplier-modal-preview" class="z-30 rounded-r w-10 flex items-center justify-center bg-theme-1 border text-white dark:bg-dark-1 dark:border-dark-4 -ml-1">+</a>
            </div>

            <button class="notification-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
            </button>
        </div>
        <button class="messages-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
        </button>
    </div>
    <div class="app-content">
        <div class="app-sidebar">
            <a href="" class="app-sidebar-link active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" /></svg>
            </a>
            <a href="" class="app-sidebar-link">
                <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-pie-chart" viewBox="0 0 24 24">
                    <defs />
                    <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
                </svg>
            </a>
            <a href="" class="app-sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" /></svg>
            </a>
            <a href="" class="app-sidebar-link">
                <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-settings" viewBox="0 0 24 24">
                    <defs />
                    <circle cx="12" cy="12" r="3" />
                    <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                </svg>
            </a>
            <a href="javascript:;" style="margin: auto 0;" class="app-sidebar-link ">
                <button class="mode-switch active" title="Switch Theme ">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </a>
        </div>
        <div id="product_page" class="projects-section">
            <div class="projects-section-header">


                {{--<p class="time">December, 12</p>--}}
            </div>
            <div class="projects-section-header">
                <p>Products</p>
                <div class="search-wrapper">
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                {{--<p class="time">December, 12</p>--}}
            </div>
            {{--<div class="projects-section-line">--}}
                {{--<div class="projects-status">--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">45</span>--}}
                        {{--<span class="status-type">In Progress</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">24</span>--}}
                        {{--<span class="status-type">Upcoming</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">62</span>--}}
                        {{--<span class="status-type">Total Projects</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="view-actions">--}}
                    {{--<button class="view-btn list-view" title="List View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">--}}
                            {{--<line x1="8" y1="6" x2="21" y2="6" />--}}
                            {{--<line x1="8" y1="12" x2="21" y2="12" />--}}
                            {{--<line x1="8" y1="18" x2="21" y2="18" />--}}
                            {{--<line x1="3" y1="6" x2="3.01" y2="6" />--}}
                            {{--<line x1="3" y1="12" x2="3.01" y2="12" />--}}
                            {{--<line x1="3" y1="18" x2="3.01" y2="18" /></svg>--}}
                    {{--</button>--}}
                    {{--<button class="view-btn grid-view active" title="Grid View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">--}}
                            {{--<rect x="3" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="14" width="7" height="7" />--}}
                            {{--<rect x="3" y="14" width="7" height="7" /></svg>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div  class="project-boxes jsGridView">
                @if($products) @foreach($products as $key => $value)
                    <a href="javascript:" onclick="addProductToList('{{$value->id}}');" class="project-box-wrapper">
                        <div class="project-box"  style="background-image: url('/resources/core_data/products/cookies.jpg');background-size: cover;">
                            <div style="padding: 25%;" class="project-box-header">
                                <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%; margin-top: -50%;margin-left: -50%;">
                                   <?php $price = $value->price + ($value->tax_percentage / 100) * $value->price; ?>
                                    {{ round($price , 1)}} SAR
                                </div>
                                {{--<img style="width: 100%;height: 20%;" src="{{$value->product_images ? $value->product_images[0]->image : ''}}" alt="{{$value->name}}">--}}
                            </div>
                            <div class="project-box-footer">
                                <div class="participants2">
                                    <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%;">
                                        {{$value->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach @endif
            </div>
        </div>
        <div style="display: none;" id="invoice_page" class="projects-section">
            <div class="projects-section-header">
                <p>Invoice's</p>
                <div class="search-wrapper">
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                {{--<p class="time">December, 12</p>--}}
            </div>
            {{--<div class="projects-section-line">--}}
                {{--<div class="projects-status">--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">45</span>--}}
                        {{--<span class="status-type">In Progress</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">24</span>--}}
                        {{--<span class="status-type">Upcoming</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">62</span>--}}
                        {{--<span class="status-type">Total Projects</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="view-actions">--}}
                    {{--<button class="view-btn list-view" title="List View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">--}}
                            {{--<line x1="8" y1="6" x2="21" y2="6" />--}}
                            {{--<line x1="8" y1="12" x2="21" y2="12" />--}}
                            {{--<line x1="8" y1="18" x2="21" y2="18" />--}}
                            {{--<line x1="3" y1="6" x2="3.01" y2="6" />--}}
                            {{--<line x1="3" y1="12" x2="3.01" y2="12" />--}}
                            {{--<line x1="3" y1="18" x2="3.01" y2="18" /></svg>--}}
                    {{--</button>--}}
                    {{--<button class="view-btn grid-view active" title="Grid View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">--}}
                            {{--<rect x="3" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="14" width="7" height="7" />--}}
                            {{--<rect x="3" y="14" width="7" height="7" /></svg>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div  class="project-boxes jsGridView">
                @if($products) @foreach($products as $key => $value)
                    <a href="javascript:" onclick="addProductToList('{{$value->id}}');" class="project-box-wrapper">
                        <div class="project-box"  style="background-image: url('/resources/core_data/products/cookies.jpg');background-size: cover;">
                            <div style="padding: 25%;" class="project-box-header">
                                <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%; margin-top: -50%;margin-left: -50%;">
                                   <?php $price = $value->price + ($value->tax_percentage / 100) * $value->price; ?>
                                    {{ round($price , 1)}} SAR
                                </div>
                                {{--<img style="width: 100%;height: 20%;" src="{{$value->product_images ? $value->product_images[0]->image : ''}}" alt="{{$value->name}}">--}}
                            </div>
                            <div class="project-box-footer">
                                <div class="participants2">
                                    <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%;">
                                        {{$value->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach @endif
            </div>
        </div>
        <div style="display: none;" id="pay_page" class="projects-section">
            <div class="projects-section-header">
                <p>Pay</p>
                <div class="search-wrapper">
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                {{--<p class="time">December, 12</p>--}}
            </div>
            {{--<div class="projects-section-line">--}}
                {{--<div class="projects-status">--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">45</span>--}}
                        {{--<span class="status-type">In Progress</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">24</span>--}}
                        {{--<span class="status-type">Upcoming</span>--}}
                    {{--</div>--}}
                    {{--<div class="item-status">--}}
                        {{--<span class="status-number">62</span>--}}
                        {{--<span class="status-type">Total Projects</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="view-actions">--}}
                    {{--<button class="view-btn list-view" title="List View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">--}}
                            {{--<line x1="8" y1="6" x2="21" y2="6" />--}}
                            {{--<line x1="8" y1="12" x2="21" y2="12" />--}}
                            {{--<line x1="8" y1="18" x2="21" y2="18" />--}}
                            {{--<line x1="3" y1="6" x2="3.01" y2="6" />--}}
                            {{--<line x1="3" y1="12" x2="3.01" y2="12" />--}}
                            {{--<line x1="3" y1="18" x2="3.01" y2="18" /></svg>--}}
                    {{--</button>--}}
                    {{--<button class="view-btn grid-view active" title="Grid View">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">--}}
                            {{--<rect x="3" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="3" width="7" height="7" />--}}
                            {{--<rect x="14" y="14" width="7" height="7" />--}}
                            {{--<rect x="3" y="14" width="7" height="7" /></svg>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div  class="project-boxes jsGridView">
                @if($products) @foreach($products as $key => $value)
                    <a href="javascript:" onclick="addProductToList('{{$value->id}}');" class="project-box-wrapper">
                        <div class="project-box"  style="background-image: url('/resources/core_data/products/cookies.jpg');background-size: cover;">
                            <div style="padding: 25%;" class="project-box-header">
                                <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%; margin-top: -50%;margin-left: -50%;">
                                   <?php $price = $value->price + ($value->tax_percentage / 100) * $value->price; ?>
                                    {{ round($price , 1)}} SAR
                                </div>
                                {{--<img style="width: 100%;height: 20%;" src="{{$value->product_images ? $value->product_images[0]->image : ''}}" alt="{{$value->name}}">--}}
                            </div>
                            <div class="project-box-footer">
                                <div class="participants2">
                                    <div class="days-left" style="color: #1e1d2e;font-weight: bold;font-size: 16px;opacity: 86%;">
                                        {{$value->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach @endif
            </div>
        </div>
        <div class="messages-section">
            {{--<button class="messages-close">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">--}}
                    {{--<circle cx="12" cy="12" r="10" />--}}
                    {{--<line x1="15" y1="9" x2="9" y2="15" />--}}
                    {{--<line x1="9" y1="9" x2="15" y2="15" /></svg>--}}
            {{--</button>--}}
            {{--<div class="projects-section-header">--}}
                {{--<p>Items</p>--}}
                {{--<div class="days-left" style="color: #4067f9;background: transparent;">--}}
                    {{--<button class="button px-2 mr-1 mb-2 bg-gray-200 text-gray-600"> <span class="w-7 h-7 flex items-center justify-center"> <i data-feather="rotate-cw" class="w-4 h-4"></i> </span> </button>--}}
                    {{--<button class="button px-2 mr-1 mb-2 border text-gray-700 dark:bg-dark-5 dark:text-gray-300"> <span class="w-7 h-7 flex items-center justify-center"> <i data-feather="user-plus" class="w-4 h-4"></i> </span> </button>--}}
                    {{--<button class="button px-2 mr-1 mb-2 bg-theme-9 text-white"> <span class="w-7 h-7 flex items-center justify-center"> <i data-feather="dollar-sign" class="w-4 h-4"></i> </span> </button>--}}
                    {{--<button class="button px-2 mr-1 mb-2 bg-theme-1 text-white"> <span class="w-7 h-7 flex items-center justify-center"> <i data-feather="save" class="w-4 h-4"></i> </span> </button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="box flex p-5 ">--}}
                {{--<div class="w-full relative text-gray-700">--}}
                    {{--<input type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Use coupon code...">--}}
                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>--}}
                {{--</div>--}}
                {{--<button class="button text-white bg-theme-1 ml-2">Apply</button>--}}
            {{--</div>--}}

            <div id="items_list_h" class="flex items-center p-3  bg-gray-600 text-white text dark:bg-dark-4  ">
                <div  style="width: 57%;" class="pos__ticket__item-name truncate mr-1">Product</div>
                <div  class="ml-auto font-medium">QTY</div>
                <div style="width: 18%;" class="ml-auto font-medium">Price</div>
            </div>
            <div id="items_list" style="border-radius: 0;height: 45.2%;overflow: auto;" class="pos__ticket box p-2 ">
            </div>
            {{--<div id="items_list" role="main" style="height: 55%;overflow: auto;" >--}}

                {{--<div  class="item flex items-center p-3 cursor-pointer bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 ">--}}
                    {{--<div class="pos__ticket__item-name truncate mr-1">Cookies Chocolate 80Grams</div>--}}
                    {{--<div class="ml-auto font-medium">x 1</div>--}}
                    {{--<div class="ml-auto font-medium ">20 SAR</div>--}}
                    {{--<div class="ml-auto font-medium ">20 SAR</div>--}}
                    {{--<div class="ml-auto font-medium ">20 SAR</div>--}}
                    {{--<div class="ml-auto font-medium button px-2 mr-1 bg-theme-9 text-white "><span class="w-7 h-7 flex items-center justify-center"> <i data-feather="plus" class="w-4 h-4"></i> </span></div>--}}
                    {{--<div class="font-medium button px-2 mr-1 bg-theme-12 text-white "><span class="w-7 h-7 flex items-center justify-center"> <i data-feather="minus" class="w-4 h-4"></i> </span></div>--}}
                    {{--<div class="font-medium button px-2 mr-1 bg-theme-6 text-white "><span class="w-7 h-7 flex items-center justify-center"> <i data-feather="trash-2" class="w-4 h-4"></i> </span></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div id="summary" style="display: none;" class="box p-5 mt-3">--}}
                {{--<div class="flex">--}}
                    {{--<div class="mr-auto">Subtotal</div>--}}
                    {{--<div id="subtotal" class="font-medium">0.00 SAR</div>--}}
                {{--</div>--}}
                {{--<div class="flex mt-4">--}}
                    {{--<div class="mr-auto">Discount</div>--}}
                    {{--<div id="total_discount" class="font-medium text-theme-6">0.00 SAR</div>--}}
                {{--</div>--}}
                {{--<div class="flex mt-4">--}}
                    {{--<div class="mr-auto">Tax</div>--}}
                    {{--<div id="total_tax" class="font-medium">0.00 SAR</div>--}}
                {{--</div>--}}
                {{--<div class="flex mt-4 pt-4 border-t border-gray-200 dark:border-dark-5">--}}
                    {{--<div class="mr-auto font-medium text-base">Total Charge</div>--}}
                    {{--<div id="total" class="font-medium text-base">0.00 SAR</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div id="payemnts" class="box p-3 ">

                <div class="flex">
                    <div class="mr-auto">Subtotal</div>
                    <div id="subtotal" data-value="" class="font-medium">0.00 SAR</div>
                </div>
                <div class="flex mt-2">
                    <div class="mr-auto">Discount</div>
                    <div id="total_discount" data-value="" class="font-medium text-theme-6">0.00 SAR</div>
                </div>
                <div class="flex mt-2">
                    <div class="mr-auto">Tax</div>
                    <div id="total_tax" data-value="" class="font-medium">0.00 SAR</div>
                </div>
                <div class="flex mt-2 border-gray-200 dark:border-dark-5">
                    <div class="mr-auto font-medium text-base">Total Amount</div>
                    <div id="total" data-value="" class="font-medium text-base">0.00 SAR</div>
                </div>
                <div class="flex mt-2  border-gray-200 dark:border-dark-5">
                    <div class="mr-auto font-medium text-base">Total Charge</div>
                    <div id="viewer" data-value="" data-result="" class="equals font-medium text-base">0.00 SAR</div>
                </div>
                <div class="flex mt-2  border-gray-200 dark:border-dark-5">
                    <div class="mr-auto font-medium text-base">Total Outstanding Balance</div>
                    <div id="outstanding_balance" data-value=""  data-result="" class="equals font-medium text-base">0.00 SAR</div>
                </div>
                <div class="flex mt-2">
                    <div class="w-full relative text-gray-700">
                        <input type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Use coupon code...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <button class="button text-white bg-theme-1 ml-2">Apply</button>
                </div>
            </div>

            <div id="charge" style="display: none;" class="box buttons">
                <button style="position: relative; background: rgba(145,199,20,var(--tw-bg-opacity));color: #fff;" data-ops="plus" class="ops">
                    CASH
                    <span class="z-50  w-10 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                        0
                    </span>
                </button>
                <button style="position: relative; background: #0a87bf;color: #fff;" data-ops="plus" class="ops">
                    MADA
                    <span class="z-50  w-10 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                        0
                    </span>
                </button>
                <button style="position: relative; background: #FF9800;color: #fff;" data-ops="plus" class="ops">
                    VISA
                    <span class="z-50  w-10 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                        0
                    </span>
                </button>
                <button style="position: relative; background: #ff5722;color: #fff;" data-ops="plus" class="ops">
                    MASTERCARD
                    <span class="z-50  w-10 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                        0
                    </span>
                </button>
                <button style="background: #607d8b;color: #fff;" class="num" data-num="5">5 SAR</button>
                <button  style="background: #607d8b;color: #fff;" class="num" data-num="15">15 SAR</button>
                <button  id="pay_50" style="background: #607d8b;color: #fff;" class="num" data-num="100">100 SAR</button>
                <button id="pay_full" style="background: #607d8b;color: #fff;" class="num" data-num="200">200 SAR</button>
                <button style="position: relative; background: #9E9E9E;color: #fff;" >
                    <i class="fas fa-print"></i>
                    PRINT
                </button>
                <button class="num" data-num="1">1</button>
                <button class="num" data-num="2">2</button>
                <button class="num" data-num="3">3</button>
                <button style="background: #9E9E9E;color: #fff;">
                    <i class="fas fa-ban"></i>
                    VOID
                </button>
                <button class="num" data-num="4">4</button>
                <button class="num" data-num="5">5</button>
                <button class="num" data-num="6">6</button>
                <button style="background: #9E9E9E;color: #fff;"><i class="fa fa-times"></i>
                    QTY
                </button>
                <button class="num" data-num="7">7</button>
                <button class="num" data-num="8">8</button>
                <button class="num" data-num="9">9</button>
                <button id="clear" style="background: #9E9E9E;color: #fff;">
                    <i class="fas fa-sign-out-alt"></i>
                    Exit
                </button>
                <button class="num" data-num=".">.00</button>
                <button class="num" data-num="0">0</button>
                <button style="background: #555;color: #fff;" onclick="save();">POST</button>
            </div>
            <div class="box buttons2 mt-2">
                <button id="clear2" onclick="clearItemsList();" style="position: relative; background: #EEEEEE;color: #555;" >
                    CLEAR
                </button>
                <button onclick="deleteItemInList();" style="position: relative; background: #ff5722;color: #fff;">
                    DELETE
                </button>
                <button onclick="showInvoice();" style="position: relative; background:rgba(145,199,20,var(--tw-bg-opacity));color: #fff;" >
                    INVOICE
                </button>
                <button  onclick="showPay();" style="position: relative; background: #0a87bf;color: #fff;" >
                    PAY
                </button>
            </div>

            {{--<div class="messages">--}}
                {{--<div class="message-box">--}}
                    {{--<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile image">--}}
                    {{--<div class="message-content">--}}
                        {{--<div class="message-header">--}}
                            {{--<div class="name">Stephanie</div>--}}
                            {{--<div class="star-checkbox">--}}
                                {{--<input type="checkbox" id="star-1">--}}
                                {{--<label for="star-1">--}}
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">--}}
                                        {{--<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<p class="message-line">--}}
                            {{--I got your first assignment. It was quite good. 🥳 We can continue with the next assignment.--}}
                        {{--</p>--}}
                        {{--<p class="message-line time">--}}
                            {{--Dec, 12--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="message-box">--}}
                    {{--<img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile image">--}}
                    {{--<div class="message-content">--}}
                        {{--<div class="message-header">--}}
                            {{--<div class="name">Mark</div>--}}
                            {{--<div class="star-checkbox">--}}
                                {{--<input type="checkbox" id="star-2">--}}
                                {{--<label for="star-2">--}}
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">--}}
                                        {{--<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<p class="message-line">--}}
                            {{--Hey, can tell me about progress of project? I'm waiting for your response.--}}
                        {{--</p>--}}
                        {{--<p class="message-line time">--}}
                            {{--Dec, 12--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="message-box">--}}
                    {{--<img src="https://images.unsplash.com/photo-1543965170-4c01a586684e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDZ8fG1hbnxlbnwwfDB8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="profile image">--}}
                    {{--<div class="message-content">--}}
                        {{--<div class="message-header">--}}
                            {{--<div class="name">David</div>--}}
                            {{--<div class="star-checkbox">--}}
                                {{--<input type="checkbox" id="star-3">--}}
                                {{--<label for="star-3">--}}
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">--}}
                                        {{--<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<p class="message-line">--}}
                            {{--Awesome! 🤩 I like it. We can schedule a meeting for the next one.--}}
                        {{--</p>--}}
                        {{--<p class="message-line time">--}}
                            {{--Dec, 12--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="message-box">--}}
                    {{--<img src="https://images.unsplash.com/photo-1533993192821-2cce3a8267d1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTl8fHdvbWFuJTIwbW9kZXJufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="profile image">--}}
                    {{--<div class="message-content">--}}
                        {{--<div class="message-header">--}}
                            {{--<div class="name">Jessica</div>--}}
                            {{--<div class="star-checkbox">--}}
                                {{--<input type="checkbox" id="star-4">--}}
                                {{--<label for="star-4">--}}
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">--}}
                                        {{--<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<p class="message-line">--}}
                            {{--I am really impressed! Can't wait to see the final result.--}}
                        {{--</p>--}}
                        {{--<p class="message-line time">--}}
                            {{--Dec, 11--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
<script>

    $('select.customer_id').select2({
        placeholder: 'Select an option',
    });
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '/' +mm + '/' + dd  ;
    var items =[];
    var products =[];
    var payments =[];
    var  paymentObj = {cash:0,mada:0,visa:0,mastercard:0,total:0,total_amount:0,outstanding_balance:0};
    function showInvoice() {
        $('#product_page').hide();
        $('#invoice_page').show();
    }
    function showPay() {
        $('#items_list_h').toggle();
        $('#items_list').toggle();
        $('#charge').toggle();
    }
    function setItemsList() {
        if(products.length > 0){
            var subtotal = 0;
            var total_discount = 0;
            var total_tax = 0;
            var total = 0;
            $('#items_list').find('a.item').remove();
            $.each(products,function (k,v) {
                var item = '<a href="javascript:;" onclick="getItemInfo(this);" data-id="'+v.id+'" class="item flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1">\n' +
                    '                    <div class="pos__ticket__item-name truncate mr-1">\n' +
                    '                       '+v.name+'' +
                    '                    </div>\n' +
                    '                    <div class="ml-auto font-medium">x '+v.qty+'</div>\n' +
                    '                    <div class="ml-auto font-medium">'+v.total.toFixed(1)+' SAR</div>\n' +
                    '                </a>';

                $('#items_list').append(item);
                subtotal += (v.price * v.qty);
                total_tax += v.tax;
                total += v.total;
            });
            $('#subtotal').attr('data-value',subtotal > 0 ? subtotal.toFixed(1) :0).html(subtotal > 0 ? subtotal.toFixed(1) + ' SAR':0.00 + ' SAR');
            $('#total_discount').attr('data-value',total_discount > 0 ? total_discount.toFixed(1) :0).html(total_discount > 0 ? total_discount.toFixed(1) + ' SAR':0.00 + ' SAR');
            $('#total_tax').attr('data-value',total_tax > 0 ? total_tax.toFixed(1) :0).html(total_tax > 0 ? total_tax.toFixed(1) + ' SAR':0.00 + ' SAR');
            $('#total').attr('data-value',total > 0 ? total.toFixed(1) :0).html(total > 0 ? total.toFixed(1) + ' SAR':0.00 + ' SAR');
            if(total > 0){
                $('#pay_50').attr('data-num',(total/2).toFixed(1)).html((total/2).toFixed(1) + ' SAR');
                $('#pay_full').attr('data-num',total.toFixed(1)).html(total.toFixed(1) + ' SAR');
            }
            paymentObj.total_amount = total.toFixed(1);
            console.log(products);
            return false;
        }
        $('#subtotal').html(0.00 + ' SAR');
        $('#total_discount').html(0.00 + ' SAR');
        $('#total_tax').html(0.00 + ' SAR');
        $('#total').html(0.00 + ' SAR');
    }
    function plusItemInList(el) {
        if(products.length > 0){
            var id = $(el).parent().data('id');
            if(products.length > 0){
                $.each(products,function (k,v) {
                    if(id === v.id){
                        products[k].qty = products[k].qty+1;
                        products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                        products[k].total = (products[k].price *  products[k].qty + products[k].tax);
                        setItemsList();
                        return false;
                    }
                });
            }
        }
    }
    function minusItemInList(el) {
        if(products.length > 0){
            var id = $(el).parent().data('id');
            if(products.length > 0){
                $.each(products,function (k,v) {
                    if(id === v.id){
                        if(v.qty === 1){
                            products.splice(k,1);
                            $(el).parent().remove();
                            setItemsList();
                            return false;
                        }
                        products[k].qty = products[k].qty-1;
                        products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                        products[k].total = (products[k].price *  products[k].qty + products[k].tax);
//                        products.splice(k,1);
//                        products.push(item);
                        setItemsList();
                        return false;
                    }
                });
            }
        }
    }
    function deleteItemInList() {
        if(products.length > 0){
            $.each(products,function (k,v) {
                if(items.some(item => item.id === v.id)){
                    products.splice(k,1);
                    items = [];
                    $('#items_list').find('a[data-id="'+v.id+'"]').remove();
                    setItemsList();
                    return false;
                }
            });
        }
    }
    function clearItemsList() {
        console.log(items);
        if(products.length > 0){
             items = [];
             products = [];
            $('#items_list').find('a').remove();
             $('#pay_50').attr('data-num',50).html(50 + ' SAR');
             $('#pay_full').attr('data-num',100).html(100 + ' SAR');
            setItemsList();
            return true;
        }
    }
    function getItemInfo(el) {
        var id = $(el).data('id');
        if(items.length > 0){
            items = [];
            items.push({id:id});
            $('#delete_item').removeAttr('disabled');
        }
        items.push({id:id});
        $('#delete_item').removeAttr('disabled');
    }
    function addProductToList(id) {
        $.ajax({
            url:'/products/'+id+'/find',
            type:'get',
            dataType:'JSON',
            async:false,
            success:function (data) {
                var dublicated = false;
                var tax = (data.data.tax_percentage / 100 ) * data.data.price;
                var price = data.data.price;
                var total = data.data.price + tax ;
                var item = {id:data.data.id,sku:data.data.sku,name:data.data.name,ar_name:data.data.ar_name,
                    price:price,tax:tax,tax_percentage:data.data.tax_percentage,total:total,qty:1};
                if(products.length > 0){
                    $.each(products,function (k,v) {
                        if(data.data.id === v.id){
                            products[k].qty = products[k].qty+1;
                            products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                            products[k].total = (products[k].price *  products[k].qty + products[k].tax);
                            dublicated = true;
                            return false;
                        }
                    });
                }
               dublicated === false ?  products.push(item) : '';
            }
        });
        return setItemsList();
    }
    function save() {
        console.log(products);
        console.log(payments);
        console.log(paymentObj);
        if(products.length > 0 && paymentObj.total > 0){
            var total_due = 0;
            var total_tax = 0;
            var total_qty = 0;
            var total_amount = 0;
            var subtotal_amount = 0;
            var form_data = new FormData();
            $.each(payments,function (k,v) {
                total_due += parseFloat(v.amount);
                form_data.append('payments['+k+'][payment_method]',v.payment_method);
                form_data.append('payments['+k+'][amount]',v.amount);
                form_data.append('payments['+k+'][date]',v.date);
                form_data.append('payments['+k+'][outstanding_balance]',v.outstanding_balance);
                form_data.append('payments['+k+'][status]',v.status);
//                data.payments.push([{name:'payment_method',value:},{name:'amount',value:v.amount},{name:'date',value:v.date},
//                    {name:'outstanding_balance',value:v.outstanding_balance},{name:'status',value:v.status}
//                ]);
            });
            $.each(products,function (k,v) {
                total_qty += parseFloat(v.qty);
                total_tax += parseFloat(v.tax);
                total_amount += parseFloat(v.total);
                var subtotal = v.price * v.qty;
                subtotal_amount += parseFloat(subtotal);
                form_data.append('items['+k+'][name]',v.name);
                form_data.append('items['+k+'][sku]',v.sku);
                form_data.append('items['+k+'][price]',v.price);
                form_data.append('items['+k+'][qty]',v.qty);
                form_data.append('items['+k+'][subtotal]',subtotal.toFixed(1));
                form_data.append('items['+k+'][total_tax_amount]',v.tax.toFixed(1));
                form_data.append('items['+k+'][total_amount]',v.total.toFixed(1));
            });
            form_data.append('customer_id',$('#customer_id').val());
            form_data.append('branch_id',1);
            form_data.append('subtotal',subtotal_amount.toFixed(1));
            form_data.append('total_tax_amount',total_tax.toFixed(1));
            form_data.append('total_discount_amount',0);
            form_data.append('total_amount',total_amount.toFixed(1));
            form_data.append('total_balance',total_amount.toFixed(1));
            form_data.append('total_due',total_due.toFixed(1));
            form_data.append('total_qty',total_qty);
            $.ajax({
                url:'/store',
                type:'POST',
                dataType:'json',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if(data.status === 'success'){
                        showPay();
                        $('#clear2').click();
//                        unLoadingContentAjaxBlock();
//                        window.location.href = '/sales/orders/'+data.data.id+'/show';
                    }
                },
            });
        }
    }
    $(document).ready(function () {
        $('.mode-switch').click(function () {
            document.documentElement.classList.toggle('dark');
            $(this).toggleClass('active');
        });
    });
</script>
@endsection