import { AiFillMacCommand } from "react-icons/ai";
import { BsBell } from "react-icons/bs";
import { WiAlien } from "react-icons/wi";
import {Link} from "react-router-dom";
import {GiHamburgerMenu} from "react-icons/gi";
import {useState} from "react";
const Navbar = () => {
    const [isNavOpen, setIsNavOpen] = useState(false);

    const toggleNav = () => {
        setIsNavOpen(!isNavOpen);
        console.log(isNavOpen)
    };
    return (
        <nav className="font-sans flex justify-between px-7 py-4 items-center bg-jBlack fixed top-0 left-0 w-full z-10">
            <div className="text-jBlue min-[500px]:hidden">
                <a href="#" onClick={toggleNav}><GiHamburgerMenu className="text-5xl"/></a>
                    <ul className={isNavOpen ? "w-96 gap-4 text-jGray px-2 py-12" : "hidden"}>
                        <li className="mb-2 text-2xl text-jWhite"><a href="#">Find Jobs</a></li>
                        <li><a href="#">Find Talent</a></li>
                        <li><a href="#">Upload Job</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
            </div>
            <div className="text-jBlue max-[500px]:hidden">
                <a href="#"><AiFillMacCommand className="text-5xl"/></a>
            </div>
            <div className="max-[500px]:hidden">
                <ul className="flex gap-4 text-jGray">
                    <li><a href="#">Find Jobs</a></li>
                    <li><a href="#">Find Talent</a></li>
                    <li><a href="#">Upload Job</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            <div className="flex items-center gap-4 text-jWhite">
                <div className={isNavOpen ? "hidden" : "bg-jGray p-2 rounded-full bg-opacity-20"}>
                    <a href="#" className="decoration-0 no-underline"><BsBell/></a>
                </div>
                <p className="max-[500px]:hidden"><a href="#">Tony</a></p>
                {/*<img src="" alt=""/>*/}
                <a href="#" className="max-[500px]:hidden"><WiAlien/></a>
            </div>
        </nav>
    )
}

export default Navbar;
