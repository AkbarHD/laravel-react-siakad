import { cn } from "@/lib/utils";
import { IconSchool } from "@tabler/icons-react";
import { Link } from "lucide-react";

export default function ApplicationLogo({bgLogo, colorLogo, colorText}){
    return (
        // cn itu untuk menggabungkan antara class
        <Link href="" className={cn('flex flex-row items-center gap-x-2')}>
            <div className={cn('text-foreground flex aspect-square size-12 items-center justify-center rounded-full bg-gradient-to-r', bgLogo)}>

                <IconSchool className={cn('siz-8', colorLogo)} />

            </div>

            {/* contohnya sprti ini yak utk cn */}
            <div className={cn('grid flex-1 text-left leading-tight', colorText)}>
                    <span className="font-bold truncate">SIAKU</span>
                    <span className="text-xs tracking-tighter truncate">Teman Setia Mahasiswa</span>
            </div>
        </Link>
    )
}
