<?php
abstract class ReportHeader {
    abstract public function generateHeader();
}
abstract class ReportBody {
    abstract public function generateBody();
}

// HTML Report 
class HTMLReportHeader extends ReportHeader {
    public function generateHeader() {
        echo "HTML Report Header";
    }
}

class HTMLReportBody extends ReportBody {
    public function generateBody() {
        echo "HTML Report Body";
    }
}

//PDF Report
class PDFReportHeader extends ReportHeader {
    public function generateHeader() {
        echo "PDF Report Header";
    }
}

class PDFReportBody extends ReportBody {
    public function generateBody() {
        echo "PDF Report Body";
    }
}

//excel Report
class EXCELReportHeader extends ReportHeader {
    public function generateHeader() {
        echo "EXCEL Report Header";
    }
}

class EXCELReportBody extends ReportBody {
    public function generateBody() {
        echo "EXCEL Report Body";
    }
}

// Here start Factory Classes
abstract class ReportFactory {
    abstract public function createHeader();
    abstract public function createBody();
}

// HTML Report Factory
class HTMLReportFactory extends ReportFactory {
    public function createHeader() {
        return new HTMLReportHeader();
    }

    public function createBody() {
        return new HTMLReportBody();
    }
}

// PDF Report Factory
class PDFReportFactory extends ReportFactory {
    public function createHeader() {
        return new PDFReportHeader();
    }
    public function createBody() {
        return new PDFReportBody();
    }
}

// EXCEL Report Factory
class EXCELReportFactory extends ReportFactory {
    public function createHeader() {
        return new EXCELReportHeader();
    }
    public function createBody() {
        return new EXCELReportBody();
    }
}


// client code 
// $fac = new HTMLReportFactory(); // here create factory
// $fac = new PDFReportFactory(); // here create factory
$fac = new EXCELReportFactory(); // here create factory

$header = $fac -> createHeader();
$body = $fac -> createBody();

$header -> generateHeader();
echo "<br>";
$body -> generateBody();