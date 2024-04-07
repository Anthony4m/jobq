import {AiFillStar} from "react-icons/ai";
import {BsBook} from "react-icons/bs";
import {BiSearch} from "react-icons/bi";

const Hero = () => {
return(
    // <div className="bg-jBlack flex justify-center items-center text-jWhite">
    <section className="font-sans bg-jBlack text-jWhite px-7 py-10 pt-[80px]">
        <div className="text-4xl mt-5 font-medium mb-10">
            <p className="flex gap-4">Find Your Dream Job Here <AiFillStar /></p>
        </div>
        <div className="bg-white rounded-full pr-1">
            <div className="w-full flex items-center gap-1 text-jBlack">
                <label className="relative block flex-1 w-full">
                    <span className="absolute inset-y-0 left-0  flex items-center pl-2">
                    <BiSearch className="h-5 w-5 fill-slate-300 text-jBlue" viewBox="0 0 20 20"/>
                  </span>
                    <input className="border-none rounded-l-full flex-1 w-full py-5 px-10 focus:border-none"
                           placeholder={`Job Title`}/>
                </label>
                <div className="border-l-2 border-solid border-gray-500 bg-gray-950 py-4"></div>
                <label className="relative block flex-1 w-full ">
                    <span className="absolute inset-y-0 left-0 top-1 flex items-center pl-2">
                    <BsBook className="h-5 w-5 fill-slate-300 text-jBlue" viewBox="0 0 20 20"/>
                  </span>
                    <input className="rounded-r-full py-5 px-10 flex-1 w-full " placeholder="Add country or City"/>
                </label>
                <button className="bg-jBlue text-jWhite rounded-full min-[500px]:px-12 py-4 max-[500px]:px-4">Search</button>
            </div>
        </div>
    </section>
)
}
export default Hero;
