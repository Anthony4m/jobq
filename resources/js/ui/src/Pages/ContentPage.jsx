import React from 'react';
import SideFilter from "../components/SideFilter.jsx";
import JobListings from "../components/JobListings.jsx";

const ContentPage = () => {
    return(
        <div className="min-[500px]:flex w-full gap-3 bg-jWhite min-[500px]:px-20 min-[500px]:py-10">
            <SideFilter/>
            <JobListings/>
        </div>
    )
}

export default ContentPage;
