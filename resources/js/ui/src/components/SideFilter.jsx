import CheckerBox from "./CheckerBox.jsx";
import {useEffect, useState} from "react";
import SalaryRange from "./SalaryRange.jsx";
import {BsFilter} from "react-icons/bs";

const SideFilter = () => {
    const [isOpen,setIsOpen] = useState(false)
    const toggleAside = () => {
        setIsOpen(!isOpen);
    };
    const handleClose = () => {
        setIsOpen(false);
    };
    useEffect(() => {
        if (isOpen) {
            // Disable scrolling when the aside is open
            document.body.style.overflow = "hidden";
        } else {
            // Enable scrolling when the aside is closed
            document.body.style.overflow = "auto";
        }

        // Clean up the effect
        return () => {
            document.body.style.overflow = "auto";
        };
    }, [isOpen]);
    return(
        <>
            <div className="pl-4 mb-3 min-[500px]:hidden">
                <button onClick={toggleAside}
                        className="flex items-center gap-3 p-3 border-2 rounded-3xl bg-white text-sm  cursor-pointer hover:text-jBlue">
                    <BsFilter className="text-xl "/>
                    Filters
                </button>
            </div>


            <aside className={isOpen ? "absolute inset-x-5 h-full bg-white p-4 z-10 overflow-y-auto" : "min-[500px]:block w-1/4 p-4 max-[500px]:hidden"}>
                <div className="sticky min-[500px]:top-36 flex flex-col gap-2 p-2 border rounded-xl ">
                    <div className="flex justify-between items-center  border-b-2 py-3">
                        <h3 className=" text-xl font-medium">Filter</h3>
                        <p className="text-green-500 text-sm">
                            {isOpen ? (<button onClick={handleClose} className="text-green-500 text-sm">
                                    Close
                                </button>)
                                :
                                (<button onClick={handleClose} className="text-green-500 text-sm">
                                    Reset
                                </button>)}
                        </p>
                    </div>
                    <div>
                        <CheckerBox title={"Sort By"} children={["Recently", "A-Z", "Top Salary", "Rating"]}/>
                        <SalaryRange/>
                        <CheckerBox title={"Job Type"}
                                    children={["Full-Time", "Part-Time", "Contractual", "Freelance", "Internship"]}/>
                        <CheckerBox title={"Work Location"} children={["On-Site", "Remote", "Hybrid"]}/>
                        <CheckerBox title={"Experience"} children={["Fresher", "Beginner", "Intermediate", "Expert"]}/>
                    </div>
                </div>

            </aside>
        </>
    )
}

export default SideFilter;
