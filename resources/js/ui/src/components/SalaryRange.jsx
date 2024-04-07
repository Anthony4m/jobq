import React, { useState } from 'react';

const SalaryRange = () => {
    const [value, setValue] = useState(1000);

    const handleChange = (e) => {
        setValue(e.target.value);
    };

    return (
        <div className="relative mb-6">
            <label htmlFor="salary-range-input" className="sr-only">Salary Range</label>
            <input
                id="salary-range-input"
                type="range"
                value={value}
                min="100"
                max="1500"
                onChange={handleChange}
                className="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
            />
            <span className="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">$100</span>
            <span className="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$500</span>
            <span className="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">${value}</span>
            <span className="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">$1500</span>
        </div>
    );
};

export default SalaryRange;
