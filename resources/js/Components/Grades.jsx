import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from "@/Components/ui/sheet";
import { Button } from "@/Components/ui/button";
import { IconEye } from "@tabler/icons-react";
import { Table, TableBody, TableCell, TableFooter, TableHead, TableHeader, TableRow } from "@/Components/ui/table";

export default function Grades({studyResult, grades, name = null}){
    return(
        <Sheet>
            <SheetTrigger asChild>
                <Button variant="purple" size="sm">
                    <IconEye className="size-4 text-white" />
                </Button>
            </SheetTrigger>

            <SheetContent side='top'>
                    <SheetHeader>
                        <SheetTitle>Detail kartu hasul study Mahasiswa {name}</SheetTitle>
                        <SheetDescription>Detail Kartu studi mahasiswa</SheetDescription>
                    </SheetHeader>

                    <Table className="w-full border">
                        <TableHeader>

                            <TableRow>
                                <TableHead className="border">No</TableHead>
                                <TableHead className="border">Kode</TableHead>
                                <TableHead className="border">Mata Kuliah</TableHead>
                                <TableHead className="border">SKS</TableHead>
                                <TableHead className="border">Huruf Mutu</TableHead>
                                <TableHead className="border">Bobot</TableHead>
                                <TableHead className="border">Nilai</TableHead>
                            </TableRow>

                        </TableHeader>

                        <TableBody>
                            {grades.map((grade, index) => {
                                <TableRow key={index}>
                                    <TableCell className="border">{index + 1}</TableCell>
                                    <TableCell className="border">{grade.course.code}</TableCell>
                                    <TableCell className="border">{grade.course.name}</TableCell>
                                    <TableCell className="border">{grade.course.credit}</TableCell>
                                    <TableCell className="border">{grade.letter}</TableCell>
                                    <TableCell className="border">{grade.grade}</TableCell>
                                </TableRow>
                            })}
                        </TableBody>

                        <TableFooter className="font-bold">
                            <TableRow>
                                <TableCell colSpan="3">Ip Semester</TableCell>
                                <TableCell className="border">{studyResult.gpa}</TableCell>
                                <TableCell className="border"></TableCell>
                                <TableCell className="border"></TableCell>
                            </TableRow>
                        </TableFooter>
                    </Table>
            </SheetContent>
        </Sheet>
    )
}
