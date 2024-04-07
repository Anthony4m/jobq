import React from 'react';

const CheckerBox = (props) => {
    return (
        <div className="mt-5">
        <h3 className="text-xl font-medium">{props.title}</h3>
    <div className="grid grid-cols-2 grid-rows-2 mb-5">
        {props.children.map((filterType)=> (
            <div key={props.children.indexOf(filterType)} className="flex content-center">
                <input className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" value={filterType} name={filterType}/>
                <p className="ml-2 ms-2 text-sm font-medium text-gray-900">{filterType}</p>
            </div>
        ))}
    </div>
        </div>
    )
};

export default CheckerBox;
