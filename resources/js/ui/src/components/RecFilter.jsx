import React from 'react';
import {BsToggles2} from "react-icons/bs";

const RecFilter = () => {
 return(
     <div className="font-sans px-4 py-10 flex justify-between items-center">
         <h1 className="font-medium min-[500px]:text-3xl ">Recommended Jobs</h1>
         <button className="flex items-center min-[500px]:space-x-3 max-[500px]:text-sm max-[500px]:gap-2 border border-solid border-gray-950 px-4 py-2 rounded-full">
             <h2>Most Recent</h2>
             <BsToggles2 />
         </button>
     </div>

 )
};

export default RecFilter;
