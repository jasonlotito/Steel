<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:template name="TextArea">
    <xsl:param name="value"/>
    <xsl:param name="label"/>
    <xsl:param name="name"/>
    <xsl:param name="class"/>
    <xsl:param name="id"/>
    <xsl:param name="placeholder"/>

    <label class="control-label">
      <xsl:value-of select="$label"/>
    </label>
    <div class="controls">
      <textarea>
        <xsl:attribute name="id">
          <xsl:value-of select="$id"/>
        </xsl:attribute>
        <xsl:attribute name="class">
          <xsl:value-of select="$class"/>
        </xsl:attribute>
        <xsl:attribute name="name">
          <xsl:value-of select="$name"/>
        </xsl:attribute>
        <xsl:text><![CDATA[]]></xsl:text>
        <xsl:value-of select="$value"/>
      </textarea>
    </div>
  </xsl:template>

</xsl:stylesheet>
